<?php


class IntegrationMoneybirdController2 extends AdminController
{
    public $access_token;
    public $config = array(
        'clientname'   => 'XXX',                  // see Moneybird URL: yourclientname.moneybird.nl
        'emailaddress' => 'XXX@eenvoudmedia.nl',  // You set this when creating the account
        'password'     => 'XXX',                   // The password you set in Moneybird when you confirmed the e-mail address
        'endpoint'     => 'https://moneybird.com/api/v2/123/',
        'client_id'     => 'xxxxxxxx',
        'client_secret' => 'xxxxxxxx',
        'redirect_uri'  => 'http://xxx/admin/integrations/moneybird/oauth',
        'code'          => 'xxxxxxxx'
    );

    public function authorizeUrl($client_id, $callback, $scopes = array())
    {
      $pattern = "https://moneybird.com/oauth/authorize?client_id=%s&redirect_uri=%s&scope=%s&response_type=code";
      return sprintf($pattern, $client_id,
                               urlencode($callback),
                               implode("+", $scopes));
    }

    public function getAccessCode()
    {
        return $this->config['code'];
    }


    public function getRequest($url)
    {
        $access_token = $this->config['code'];
        $request_url  = $this->config['endpoint'].$url;
        error_log('getRequest '.$request_url);

        $response = \Httpful\Request::get($request_url)
            ->addHeader('Authorization', "Bearer {$access_token}")
            ->send();

        error_log('getRequest response '.$response);
        $response = json_decode($response);
        if(isset($response->error))
        {
            throw new Exception('eenvoudcrm error : '.json_encode($response));
        }

        return $response;
    }

    public function patchRequest($url, $data = null)
    {
        $access_token = $this->config['code'];
        $request_url  = $this->config['endpoint'].$url;

        error_log('patchRequest '.$request_url.' data '.$data);
        $response = \Httpful\Request::patch($request_url)
            ->addHeader('Authorization', "Bearer {$access_token}")
            ->sendsJson()
            ->body($data)
            ->send();

        error_log('patchRequest response '.$response);
        $response = json_decode($response);
        if(isset($response->error))
        {
            throw new Exception('eenvoudcrm error : '.json_encode($response));
        }

        return $response;
    }

    public function postRequest($url, $data = null)
    {
        $access_token = $this->config['code'];
        $request_url = $this->config['endpoint'].$url;

        error_log('postRequest '.$request_url.' data '.$data);
        $response = \Httpful\Request::post($request_url)
            ->addHeader('Authorization', "Bearer {$access_token}")
            ->sendsJson()
            ->body($data)
            ->send();

        error_log('postRequest response '.$response);
        $response = json_decode($response);
        if(isset($response->error))
        {
            throw new Exception('eenvoudcrm error : '.json_encode($response));
        }

        return $response;
    }

    private function getContacts() {

        try {
            $contacts = $this->getRequest('contacts/synchronization.json');
            error_log(json_encode($contacts));
        } catch(Exception $e) {
            error_log($e->getMessage());
            die();
        }

        return $contacts;
    }

    public function sendInvoice($invoice_id, $company_id)
    {
        $contact = Company::find((int) $company_id);
        if($contact)
        {
            $put_url = '/sales_invoices/'.$invoice_id.'/send_invoice.json';
            $put_data = '{email:'.$contact->email.'}';

            try {
                $this->patchRequest($put_url, $put_data);
            } catch(Exception $e) {
                error_log($e->getMessage());
                die();
            }

        }
    }

    public function syncContacts() {

        // Title
        $title = 'Moneybird Contact Sync';
        $mContacts = $this->getContacts();

        foreach ($mContacts as $mContact)
        {
            $contact = Company::whereHas('meta', function($query) use ($mContact) {
                $query->where('type', 'moneybird')
                    ->where('subtype', 'contact')
                    ->where('key', 'id')
                    ->where('value', $mContact->id);
            })->first();

            if (!$contact) {
                $contact = new Company();
            }

            $contact->fill([
                'bedrijfsnaam'      => $mContact->companyName,
                'voornaam'          => $mContact->firstname,
                'achternaam'        => $mContact->lastname,
                'ter_attentie_van'  => $mContact->contactName,
                'adres_1'           => $mContact->address1,
                'adres_2'           => $mContact->address2,
                'postcode'          => $mContact->zipcode,
                'plaats'            => $mContact->city,
                'land'              => $mContact->country,
                'email'             => $mContact->email,
                'telefoon'          => $mContact->phone,
                'btw_nummer'        => $mContact->taxNumber,
                'kvk_nummer'        => $mContact->chamberOfCommerce,
                'rekening_nummer'   => $mContact->sepaIban
            ]);
            $contact->save();

            $customerId = CompanyMeta::firstOrNew([
                'company_id'=> $contact->id,
                'type'      => 'moneybird',
                'subtype'   => 'contact',
                'key'       => 'customerid'
            ]);
            $customerId->value = $mContact->customerId;
            $customerId->save();

            $id = CompanyMeta::firstOrNew([
                'company_id'=> $contact->id,
                'type'      => 'moneybird',
                'subtype'   => 'contact',
                'key'       => 'id'
            ]);

            $id->value =  $mContact->id;
            $id->save();
            $contact->meta()->saveMany([$customerId, $id]);
        }

        Session::flash('success', 'Contacts succesfully synced');

        return View::make('admin/integrations/moneybird/index', compact('title', 'body'));
    }

    /**
     * [segmentDataByCompany - segment data by service id]
     * @param  [string] $all_posted_values  [posted data]
     * @param  [string] $data_type          [processed / unprocessed]
     * @return [array]                      [segmented data with service ID used as assoc key]
     */
    public function segmentDataByService($all_posted_values)
    {
        $segmented_data = [];
        foreach ($all_posted_values as $row_ndx => $row_values)
        {
            $curr_subscription = Subscription::find((int)$row_values['subscriptions.id']);
            if(!$curr_subscription)
            {
                error_log("Consistency check failure - No corresponding subscription found");
                continue;
            }

            if(!isset($segmented_data[$curr_subscription->service_id]))
            {
                // if no entry to selected company_id exists create one and assign
                $segmented_data[$curr_subscription->service_id] = [];
            }

            // append
            $segmented_data[$curr_subscription->service_id][] = $row_values;
        }

        return $segmented_data;
    }

    /**
     * [getContact]
     * @param  [type] $company_id [description]
     * @return [type]             [description]
     */
    public function getContact($company_id)
    {
        $customer_id = -1;
        if(Config::get('eenvoudcrm.moneybird_testing') === true)
        {
            $customer_id = Config::get("eenvoudcrm.moneybird_test_user_id");
        }
        else
        {
            // get mb client id
            $customer_meta = CompanyMeta::where('company_id', '=', $company_id)
                ->where('type', '=', 'moneybird')
                ->where('subtype', '=', 'contact')
                ->where('key', '=', 'id')
                ->first();

            if($customer_meta)
            {
                $customer_id = (int)$customer_meta->value;
            }
        }

        return $customer_id;
    }

    /**
     * [invoiceClient - append selected entries to a MB invoice if one exists. Otherwise create a new one]
     * @param  [array]  $all_company_values     [segmented data company row]
     * @param  [int]    $company_id             [description]
     * @param  [string] $op_type                [invoice/invoice_clear + strip/strip_clear]
     * @return [mb invoice]                     [MB invoice that was used]
     */
    public function invoiceClient($all_company_values, $company_id, $op_type)
    {
        error_log('Invoicing client');

        // create invoice details obj
        //$customer_id = Config::get('eenvoudcrm.moneybird_test_user_id');
        $customer_id = $this->getContact($company_id);
        if($customer_id === -1)
        {
            return false;
        }

        error_log('Local Contact Exists');

        $contact = null;

        try {
            $contact = $this->getRequest('contacts/'.$customer_id.'.json');
        } catch(Exception $e) {
            error_log($e->getMessage());
            die();
        }

        if(!$contact)
        {
            error_log("Consistency check failure: contact not found");
            return false;
        }

        error_log('Remote Contact Exists');

        // check for open invoices
        try {
            $open_invoices = $this->getRequest('sales_invoices.json?filter=state:draft,contact_id:'.$customer_id);
        } catch(Exception $e) {
            error_log($e->getMessage());
            die();
        }

        //$invoice = null;
        $details = [];
        $new_invoice = false;
        if(count($open_invoices) > 0)
        {
            $used_invoice_id = -1;
            error_log('found an open invoice for '.$customer_id.' - '.json_encode($open_invoices[0]));

            //$used_invoice_id = 135871568029943606;
            if(isset($open_invoices[0]->id))
            {
                $used_invoice_id = $open_invoices[0]->id;
            }

            if($used_invoice_id === -1) {
                $error_msg = 'Error: IntegrationMoneybirdController2 - Found open invoices but could not get invoice id';
                throw new Exception($error_msg);
                error_log($error_msg);
                die();
            }

            // sanity check - try getting the first invoice draft
            // try {
            //     $invoice = $this->getRequest('sales_invoices/'.$used_invoice_id.'.json');
            // } catch(Exception $e) {
            //     error_log($e->getMessage());
            //     die();
            // }
        }
        else
        {
            $new_invoice = true;
        }


        // get price and description
        if($op_type === 'subscription')
        {
            // append details
            $segmented_by_service = $this->segmentDataByService($all_company_values);
            foreach ($segmented_by_service as $service_ndx => $service_values)
            {
                $service = Service::find((int) $service_ndx);

                // load relations
                $load_cat_relation = $service->category;
                $service_line      = "\r\n*".$service->category->name." - ".$service->name."*";

                // invoice details line 1
                foreach ($service_values as $key => $company_row_values)
                {
                    $curr_price         = 0;
                    $curr_description   = '';

                    $item_id            = (int)$company_row_values['subscriptions.id'];
                    $subscription       = Subscription::find($item_id);
                    $service            = $subscription->service;
                    $service_category   = $service->category;
                    $periodicity        = $subscription->invoice_periods_id;

                    $interval_size = 1;
                    $periodicity_str = "";
                    switch($periodicity)
                    {
                        case 1:
                            $periodicity_str = "jaar";
                            $interval_size   = 12;
                            break;
                        case 2:
                            $periodicity_str = "kwartjaar";
                            $interval_size   = 4;
                            break;
                        case 3:
                            $periodicity_str = "kwartaal";
                            $interval_size   = 3;
                            break;
                        case 4:
                            $periodicity_str = "mnd";
                            $interval_size   = 1;
                            break;
                        default:
                            break;
                    }

                    // avoid MB errors dues to ammount too large
                    if($subscription->subscription_start === '0000-00-00' || $subscription->subscription_end === '000-00-00')
                    {
                        continue;
                    }

                    $start_date = new DateTime($subscription->subscription_start);
                    $end_date   = new DateTime($subscription->subscription_end);
                    $end_date->add(new DateInterval('P1D'));

                    $num_months = $start_date->diff($end_date)->m + $start_date->diff($end_date)->y*12;
                    $num_items  = floatval($num_months) / floatval($interval_size);
                    if($interval_size > $num_months)
                    {
                        $num_items       = $num_months;
                        $periodicity_str = "maand";
                    }

                    // calc price depending on whether item is singular or periodic
                    $curr_price         = round((float)$subscription->price, 2);
                    $curr_description   = ($subscription->description ? "$subscription->description" : "")." _($subscription->subscription_start - $subscription->subscription_end)_";

                    // invoice details line 1
                    $details[] = (object) [
                        'amount'            => "$num_items x $periodicity_str",
                        'description'       => $curr_description,
                        'price'             => $curr_price,
                        'tax_rate_id'       => Config::get('eenvoudcrm.taxrate_high_id'),
                        'ledger_account_id' => Config::get('eenvoudcrm.ledger_account_id')
                    ];
                }
            }
        }
        elseif($op_type === 'worklog')
        {
            $worklogs_line = "\r\n*Werklogs*";
            // invoice details line 1
            $details[] = (object) ['description' => $worklogs_line];

            foreach ($all_company_values as $company_row_ndx => $company_row_values)
            {
                $curr_price       = 0;
                $curr_description = '';
                $item_id          = (int)$company_row_values['worklogs.id'];
                $worklog          = Werklog::find($item_id);

                // round minutes to upper quarter of the hour
                $round_minutes    = floor($worklog->minutes/15.0)*15 + ($worklog->minutes%15 > 0 ? 15 : 0);
                $dec_hours        = (float)$round_minutes / 60.0;

                // calc total price
                $curr_price       = (float)Config::get('eenvoudcrm.worklog_price_per_hour') * $dec_hours;

                $hours            = floor($dec_hours);
                $minutes          = round(60.0*($dec_hours-$hours));
                $curr_description = "$worklog->date - (".($hours>0 ? "$hours h " : "")."$minutes m)".($worklog->description ? " - $worklog->description" : "");

                if($worklog->comment)
                {
                    $curr_description .= "\r\n[$worklog->comment]";
                }

                // invoice details line 1
                $details[] = (object) [
                    'amount'            => '1 x',
                    'description'       => $curr_description,
                    'price'             => $curr_price,
                    'tax_rate_id'       => Config::get('eenvoudcrm.taxrate_high_id'),
                    'ledger_account_id' => Config::get('eenvoudcrm.ledger_account_id')
                ];
            }
        }

        $details_line = '{"sales_invoice":{"details_attributes":'.json_encode((object)$details).'}}';

        $ret_invoice = null;

        // save
        try
        {
            if(!$new_invoice) {
                $ret_invoice = $this->patchRequest('sales_invoices/'.$used_invoice_id.'.json', $details_line);
            }
            else {
                $invoice = '{"sales_invoice":{"reference":"","contact_id":'.$customer_id.',"details_attributes":'.json_encode((object)$details).'}}';
                $ret_invoice = $this->postRequest('sales_invoices.json', $invoice);
            }
        } catch(Exception $e) {
            error_log($e->getMessage());
            die();
        }

        return $ret_invoice;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $title = 'Moneybird';
        $body = '';

        return View::make('admin/integrations/moneybird/index', compact('title', 'body'));
    }

}
