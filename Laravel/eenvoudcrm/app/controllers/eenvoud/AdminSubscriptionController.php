<?php

use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Join,
    DataTables\Editor\Validate;


class AdminSubscriptionController extends AdminCRUDController
{
	public function __construct()
    {
		$this->name       = 'subscriptions';
		$this->modelName  = 'Subscription';
		$this->singleName = 'subscription';

		$this->validationRules = [
            'description' => 'required'
    	];

    	$this->validationMessages = [
            'description.required' => 'Description is a required field'
    	];

    	$this->dataTableColumns = [
            'id',
            'company_id',
            'service_id',
            'description',
            'price',
            'total_price',
            'subscription_start',
            'subscription_end',
            'invoice_id',
            'invoice_periods_id',
            'status_id',
            'status_date'
        ];

        $this->dateIntervals = Config::get('eenvoudcrm.subscriptions_dateintervals');
	}

   /**
    * [subscriptionTotalPrice - get the subscription total price]
    * @param  [string] $posted_subscription [posted subscription]
    * @return [double]                      [description]
    */
    public function subscriptionTotalPrice($start_date, $end_date, $invoice_periods_id, $unit_price)
    {
        // dates
        $ts1    = strtotime($start_date);
        $ts2    = strtotime($end_date);
        $year1  = date('Y', $ts1);
        $year2  = date('Y', $ts2);
        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);
        $day1   = date('d', $ts1);
        $day2   = date('d', $ts2);

        //$months_diff = (($year2 - $year1) * 12) + ($month2 - $month1) + ($day1 === 1 ? 1 : 0);

        $months_diff 	= 0;
        $month 			= $month2;
        $year 			= $year2;

        while ( !($year == $year1 && $month == $month1) ) {
        	$month--;

        	if ($month == 0) {
        		$year--;
        		$month = 12;
        	}

        	$months_diff++;
        }
        
        //$months_diff = (($year2 - $year1) * 12);

        //if ($month2 < $month1) 

        $interval_size = 1;
        switch((int)$invoice_periods_id)
        {
            case 1:
                $interval_size = 12;
                break;
            case 2:
                $interval_size = 4;
                break;
            case 3:
                $interval_size = 3;
                break;
            case 4:
                $interval_size = 1;
                break;
            default:
                break;
        }

        $tot_intervals = floor((floatval($months_diff)/floatval($interval_size)));
        $ret = round(floatval($unit_price) * $tot_intervals, 2);

        return $ret; //$ret;
    }

    /**
     * [saveModel - save our subscription to the DB]
     * @param  boolean $subscription    [description]
     * @return [Eloquent model]         [subscription model]
     */
    protected function saveModel($subscription = false)
    {
        if (Input::get('id')) {
            $subscription = Subscription::find(Input::get('id'));
        }
        if (!$subscription) $subscription = new Subscription();

        $subscription->company_id           = Input::get('company_id');
        $subscription->service_id           = Input::get('service_id');
        $subscription->description          = Input::get('description');
        $subscription->price                = Input::get('price');
        $subscription->subscription_start   = Input::get('subscription_start');
        $subscription->subscription_end     = Input::get('subscription_end');
        $subscription->invoice_id           = Input::get('invoice_id');
        $subscription->status_date          = Input::get('status_date');
        $subscription->status_id            = Input::get('status_id');
        $subscription->invoice_periods_id   = Input::get('invoice_periods_id');

        $subscription->total_price = Input::get('total_price');
        $subscription->save();

        return $subscription;
    }

    /**
     * [getSubscriptions - get all subscriptions]
     * @return [json] [description]
     */
    public function getSubscriptions()
    {
        $subscriptions = Subscription::get(["id", "service_id"]);
        return Response::json($subscriptions);
    }

    /**
     * [getRenewals]
     * @return [json] [description]
     */
    public function getRenewals()
    {

        $renewals = Subscription::where('subscription_end', '<', date('Y-m-d'))
            ->where('status_id', '!=', Config::get('eenvoudcrm.subscriptions_status_terminated.id'))
            ->where('status_id', '!=', Config::get('eenvoudcrm.subscriptions_status_ended.id'))
            ->get();

        return Response::json($renewals);
    }

    /**
     * [getRenewals]
     * @return [json] [description]
     */
    public function getNieuwsbrieven()
    {

        $nieuwsbrieven = Subscription::where('service_id', '=', Config::get('eenvoudcrm.nieuwsbrieven_service_id'))
            ->where('status_id', '!=', Config::get('eenvoudcrm.subscriptions_status_terminated.id'))
            ->where('status_id', '!=', Config::get('eenvoudcrm.subscriptions_status_ended.id'))
            ->get();

        return Response::json($nieuwsbrieven);
    }

    /**
     * [getData - get all subscriptions data]
     * @return [json] [DT compatible object]
     */
    public function getData($model = null)
    {
        $Model = $this->modelName;

        $num_skip        = 0;
        $num_items       = 10;
        $recordsTotal    = 0;
        $recordsFiltered = 0;
        $search_value    = "";

        // check get vars
        if(isset($_GET['start']))
        {
            $num_skip = (int)$_GET['start'];
        }
        if(isset($_GET['length']))
        {
            $num_items = (int)$_GET['length'];
        }
        if(isset($_GET['search']))
        {
            $search_value = $_GET['search']['value'];
        }

        $all_subscriptions = Subscription::orderBy('subscriptions.id', 'DESC');//new Illuminate\Database\Eloquent\Collection; //Subscription::select($this->dataTableColumns);
        if($model !== null)
        {
            $all_subscriptions->where('subscriptions.company_id', '=', $model->id);
            if(!empty($search_value))
            {
                $all_subscriptions->join('services', 'subscriptions.service_id', '=', 'services.id')
                    ->whereRaw("(services.name LIKE '%".$search_value."%' OR subscriptions.description LIKE '%".$search_value."%')");
            }
        }
        else
        {
            if(!empty($search_value))
            {
                $all_subscriptions->join('companies', 'subscriptions.company_id', '=', 'companies.id')
                    ->join('services', 'subscriptions.service_id', '=', 'services.id')
                    ->whereRaw("(services.name LIKE '%".$search_value."%' OR subscriptions.description LIKE '%".$search_value."%' OR companies.bedrijfsnaam LIKE '%".$search_value."%')");
            }
        }

        $recordsTotal    = $all_subscriptions->count();
        $recordsFiltered = $recordsTotal;

        if($num_skip > 0)
        {
            $all_subscriptions->skip($num_skip);
        }

        $all_subscriptions = $all_subscriptions->take($num_items)
                                ->get();

        Debugbar::info(count($all_subscriptions));

        $data = [];
        foreach($all_subscriptions as $subscription)
        {
            // load relations
            $load_curr_company  = $subscription->company;
            $load_curr_service  = $subscription->service;
            $load_curr_category = $subscription->service->category;
            $load_curr_status   = $subscription->status;
            $load_curr_period   = $subscription->period;

            $curr_company   = $subscription->company !== NULL ? (object) ['id' => $subscription->company_id, 'bedrijfsnaam' => utf8_encode($subscription->company->bedrijfsnaam)] : (object) null;
            $curr_service   = $subscription->service !== NULL ? (object) ['id' => $subscription->service_id, 'category_id' => $subscription->category_id, 'name' => utf8_encode($subscription->service->name)] : (object) null;
            $curr_category  = $subscription->service !== NULL && $subscription->service->category !== NULL ?
                                (object) ['id' => $subscription->service->category_id, 'name' => utf8_encode($subscription->service->category->name)] :
                                (object) null;

            $curr_status    = $subscription->status !== NULL ? (object) ['id' => $subscription->status_id, 'description' => utf8_encode($subscription->status->description)] : (object) null;
            $curr_period    = $subscription->period !== NULL ? (object) ['id' => $subscription->invoice_periods_id, 'description' => utf8_encode($subscription->period->description)] : (object) null;

            $data[]         = (object) ['DT_RowId' => 'row_'.$subscription->id, 'subscriptions' => $subscription, 'companies' => $curr_company, 'service_categories' => $curr_category, 'services' => $curr_service, 'statuses' => $curr_status, 'invoice_periods' => $curr_period ];
        }

        $ret = [
            'recordsTotal'       => $recordsTotal,
            'recordsFiltered'    => $recordsFiltered,
            'data'               => $data,
            'companies'          => $this->getAllCompanies(),
            'service_categories' => $this->getAllServiceCategories(),
            'services'           => $this->getAllServices(),
            'statuses'           => $this->getAllStatuses(),
            'invoice_periods'    => $this->getAllInvoicePeriods()
        ];

        return Response::json($ret);
    }

    /**
     * [getRenewalSubscriptionData]
     * @return [json] [DT compatible object]
     */
    public function getRenewalSubscriptionData($model = null)
    {
        $Model = 'Subscription';

        $num_skip        = 0;
        $num_items       = 10;
        $recordsTotal    = 0;
        $recordsFiltered = 0;

        // check get vars
        if(isset($_GET['start']))
        {
            $num_skip = (int)$_GET['start'];
        }
        if(isset($_GET['length']))
        {
            $num_items = (int)$_GET['length'];
        }
        if(isset($_GET['search']))
        {
            $search_value = $_GET['search']['value'];
        }

        $all_subscriptions = Subscription::orderBy('subscriptions.id', 'DESC')
                ->where('subscriptions.subscription_end', '<', date('Y-m-d'))
                ->where('subscriptions.status_id', '!=', Config::get('eenvoudcrm.subscriptions_status_terminated.id'))
                ->where('subscriptions.status_id', '!=', Config::get('eenvoudcrm.subscriptions_status_ended.id'));

        if($model !== null)
        {
            $all_subscriptions->where('subscriptions.company_id', '=', $model->id);
            if(!empty($search_value))
            {
                $all_subscriptions->join('services', 'subscriptions.service_id', '=', 'services.id')
                    ->whereRaw("(services.name LIKE '%".$search_value."%' OR subscriptions.description LIKE '%".$search_value."%')");
            }
        }
        else
        {
            if(!empty($search_value))
            {
                $all_subscriptions->join('companies', 'company_id', '=', 'companies.id')
                    ->join('services', 'subscriptions.service_id', '=', 'services.id')
                    ->whereRaw("(services.name LIKE '%".$search_value."%' OR subscriptions.description LIKE '%".$search_value."%' OR companies.bedrijfsnaam LIKE '%".$search_value."%')");
            }
        }

        $recordsTotal    = $all_subscriptions->count();
        $recordsFiltered = $recordsTotal;

        if($num_skip > 0)
        {
            $all_subscriptions->skip($num_skip);
        }

        $all_subscriptions = $all_subscriptions->take($num_items)
                                ->get();

        $data = [];
        foreach($all_subscriptions as $subscription)
        {
            // load relations
            $load_curr_company  = $subscription->company;
            $load_curr_service  = $subscription->service;
            $load_curr_category = $subscription->service->category;
            $load_curr_status   = $subscription->status;
            $load_curr_period   = $subscription->period;

            $curr_company   = $subscription->company !== NULL ? (object) ['id' => $subscription->company_id, 'bedrijfsnaam' => utf8_encode($subscription->company->bedrijfsnaam)] : (object) null;
            $curr_service   = $subscription->service !== NULL ? (object) ['id' => $subscription->service_id, 'category_id' => $subscription->category_id, 'name' => utf8_encode($subscription->service->name)] : (object) null;
            $curr_category  = $subscription->service->category !== NULL ? (object) ['id' => $subscription->service->category_id, 'name' => utf8_encode($subscription->service->category->name)] : (object) null;
            $curr_status    = $subscription->status !== NULL ? (object) ['id' => $subscription->status_id, 'description' => utf8_encode($subscription->status->description)] : (object) null;
            $curr_period    = $subscription->period !== NULL ? (object) ['id' => $subscription->invoice_periods_id, 'description' => utf8_encode($subscription->period->description)] : (object) null;

            $data[]         = (object) ['DT_RowId' => 'row_'.$subscription->id, 'subscriptions' => $subscription, 'companies' => $curr_company, 'service_categories' => $curr_category, 'services' => $curr_service, 'statuses' => $curr_status, 'invoice_periods' => $curr_period ];
        }

        $ret = [
            'recordsTotal'       => $recordsTotal,
            'recordsFiltered'    => $recordsFiltered,
            'data'               => $data,
            'companies'          => $this->getAllCompanies(),
            'services'           => $this->getAllServices(),
            'service_categories' => $this->getAllServiceCategories(),
            'statuses'           => $this->getAllStatuses(),
            'invoice_periods'    => $this->getAllInvoicePeriods()
        ];

        return Response::json($ret);
    }

    /**
     * [getRenewalSubscriptionData]
     * @return [json] [DT compatible object]
     */
    public function getNieuwsbrievenSubscriptionData($model = null)
    {
        $Model = 'Subscription';

        $num_skip        = 0;
        $num_items       = 10;
        $recordsTotal    = 0;
        $recordsFiltered = 0;

        // check get vars
        if(isset($_GET['start']))
        {
            $num_skip = (int)$_GET['start'];
        }
        if(isset($_GET['length']))
        {
            $num_items = (int)$_GET['length'];
        }
        if(isset($_GET['search']))
        {
            $search_value = $_GET['search']['value'];
        }


        $all_subscriptions = Subscription::orderBy('subscriptions.id', 'DESC')
                ->where('subscriptions.service_id', '=', Config::get('eenvoudcrm.nieuwsbrieven_service_id'))
                ->where('subscriptions.status_id', '!=', Config::get('eenvoudcrm.subscriptions_status_terminated.id'))
                ->where('subscriptions.status_id', '!=', Config::get('eenvoudcrm.subscriptions_status_ended.id'));

        if($model !== null)
        {
            $all_subscriptions->where('subscriptions.company_id', '=', $model->id);
            if(!empty($search_value))
            {
                $all_subscriptions->join('services', 'subscriptions.service_id', '=', 'services.id')
                    ->whereRaw("(services.name LIKE '%".$search_value."%' OR subscriptions.description LIKE '%".$search_value."%')");
            }
        }
        else
        {
            if(!empty($search_value))
            {
                $all_subscriptions->join('companies', 'company_id', '=', 'companies.id')
                    ->join('services', 'subscriptions.service_id', '=', 'services.id')
                    ->whereRaw("(services.name LIKE '%".$search_value."%' OR subscriptions.description LIKE '%".$search_value."%' OR companies.bedrijfsnaam LIKE '%".$search_value."%')");
            }
        }

        $recordsTotal    = $all_subscriptions->count();
        $recordsFiltered = $recordsTotal;

        if($num_skip > 0)
        {
            $all_subscriptions->skip($num_skip);
        }

        $all_subscriptions = $all_subscriptions->take($num_items)
                                ->get();

        $data = [];
        foreach($all_subscriptions as $subscription)
        {
            // load relations
            $load_curr_company  = $subscription->company;
            $load_curr_service  = $subscription->service;
            $load_curr_category = $subscription->service->category;
            $load_curr_status   = $subscription->status;
            $load_curr_period   = $subscription->period;

            $curr_company   = $subscription->company !== NULL ? (object) ['id' => $subscription->company_id, 'bedrijfsnaam' => utf8_encode($subscription->company->bedrijfsnaam)] : (object) null;
            $curr_service   = $subscription->service !== NULL ? (object) ['id' => $subscription->service_id, 'category_id' => $subscription->category_id, 'name' => utf8_encode($subscription->service->name)] : (object) null;
            $curr_category  = $subscription->service->category !== NULL ? (object) ['id' => $subscription->service->category_id, 'name' => utf8_encode($subscription->service->category->name)] : (object) null;
            $curr_status    = $subscription->status !== NULL ? (object) ['id' => $subscription->status_id, 'description' => utf8_encode($subscription->status->description)] : (object) null;
            $curr_period    = $subscription->period !== NULL ? (object) ['id' => $subscription->invoice_periods_id, 'description' => utf8_encode($subscription->period->description)] : (object) null;

            $data[]         = (object) ['DT_RowId' => 'row_'.$subscription->id, 'subscriptions' => $subscription, 'companies' => $curr_company, 'service_categories' => $curr_category, 'services' => $curr_service, 'statuses' => $curr_status, 'invoice_periods' => $curr_period ];
        }

        $ret = [
            'recordsTotal'       => $recordsTotal,
            'recordsFiltered'    => $recordsFiltered,
            'data'               => $data,
            'companies'          => $this->getAllCompanies(),
            'services'           => $this->getAllServices(),
            'service_categories' => $this->getAllServiceCategories(),
            'statuses'           => $this->getAllStatuses(),
            'invoice_periods'    => $this->getAllInvoicePeriods()
        ];

        return Response::json($ret);
    }

    /**
     * [postData - handle posted subscription data]
     * @return [json] [DT compatible object]
     */

    public function postData()
    {
        $Model = $this->modelName;

        if (isset($_POST["data"]) && !empty($_POST["data"]))
        {
            $tot_price_str = $_POST['data']['subscriptions']['total_price'];
            if(empty($tot_price_str))
            {
                $subs_id = (int)$_POST['data']['subscriptions']['id'];
                $subscription = Subscription::find($subs_id);
                $tot_price_str = $this->subscriptionTotalPrice($_POST['data']['subscriptions']['subscription_start'],
                    $_POST['data']['subscriptions']['subscription_end'],
                    $_POST['data']['subscriptions']['invoice_periods_id'],
                    $_POST['data']['subscriptions']['price']);

                $_POST['data']['subscriptions']['total_price'] = $tot_price_str;
            }
        }

        // Build our Editor instance and process the data coming from _POST
        if (isset($_POST['data']['subscriptions']['id'])) {
        	//unset($_POST['data']['subscriptions']['id']);
        }
        global $db;
        $data = Editor::inst( $db, 'subscriptions' )
            ->fields(
                Field::inst( 'subscriptions.id' ),
                // Company
                Field::inst( 'subscriptions.company_id' ),
                Field::inst( 'companies.bedrijfsnaam' ),
                // Cat
                Field::inst( 'service_categories.id' ),
                Field::inst( 'service_categories.name' ),
                // Service
                Field::inst( 'subscriptions.service_id' ),
                Field::inst( 'services.name' ),
                // Description
                Field::inst( 'subscriptions.description' ),
                // Price
                Field::inst( 'subscriptions.price' ),
                // Price
                Field::inst( 'subscriptions.total_price' ),
                // Start
                Field::inst( 'subscriptions.subscription_start' ),
                // End
                Field::inst( 'subscriptions.subscription_end' )->validator( function ( $val, $data, $opts )
                {
                    $date_start = strtotime($data['subscriptions']['subscription_start']);
                    $date_end   = strtotime($data['subscriptions']['subscription_end']);

                    return ($date_end > $date_start ? true : "Error: End date precedes start date");
                }),
                // Invoice ID
                Field::inst( 'subscriptions.invoice_id' ),
                // Invoice period
                Field::inst( 'subscriptions.invoice_periods_id' ),
                Field::inst( 'invoice_periods.description' ),
                // Renewal period
                Field::inst( 'subscriptions.status_id' ),
                Field::inst( 'statuses.description' ),
                // Invoice Code
                Field::inst( 'subscriptions.status_date' )

            )
            ->leftJoin( 'invoice_periods', 'invoice_periods.id', '=',  'subscriptions.invoice_periods_id')
            ->leftJoin( 'statuses', 'statuses.id', '=',  'subscriptions.status_id')
            ->leftJoin( 'companies', 'companies.id', '=',  'subscriptions.company_id')
            ->leftJoin( 'services', 'services.id', '=',  'subscriptions.service_id')
            ->leftJoin( 'service_categories', 'service_categories.id', '=',  'services.category_id')
            ->process( $_POST )
            ->data();

        $data['companies']          = Company::all(['id AS value', 'bedrijfsnaam AS label']);
        $data['services']           = Service::all(['id AS value', 'name AS label']);
        $data['service_categories'] = ServiceCategory::all(['id AS value', 'name AS label']);
        $data['statuses']           = Status::all(['id AS value', 'description AS label']);
        $data['invoice_periods']    = Period::all(['id AS value', 'description AS label']);

        return Response::json($data);
    }

    /**
     * [postModelData - handle company specific posted subscriptions data]
     * @param  [Eloquent model] $model [company model]
     * @return [json] [DT compatible object]
     */
    public function postModelData($model)
    {
        $Model = $this->modelName;

        if (isset($_POST["data"]) && !empty($_POST["data"]))
        {
            $tot_price_str = $_POST['data']['subscriptions']['total_price'];
            if(empty($tot_price_str))
            {
                $subs_id = (int)$_POST['data']['subscriptions']['id'];
                $subscription = Subscription::find($subs_id);
                $tot_price_str = $this->subscriptionTotalPrice($_POST['data']['subscriptions']['subscription_start'],
                    $_POST['data']['subscriptions']['subscription_end'],
                    $_POST['data']['subscriptions']['invoice_periods_id'],
                    $_POST['data']['subscriptions']['price']);
                $_POST['data']['subscriptions']['total_price'] = $tot_price_str;
            }
            //error_log("Le POST".json_encode($_POST['data']['subscriptions']['total_price']));
        }

        // Build our Editor instance and process the data coming from _POST
        global $db;
        $data = Editor::inst( $db, 'subscriptions' )
            ->fields(
                Field::inst( 'subscriptions.id' ),
                // Company
                Field::inst( 'subscriptions.company_id' ),
                // Cat
                Field::inst( 'service_categories.id' ),
                Field::inst( 'service_categories.name' ),
                // Service
                Field::inst( 'subscriptions.service_id' ),
                Field::inst( 'services.name' ),
                // Description
                Field::inst( 'subscriptions.description' ),
                // Price
                Field::inst( 'subscriptions.price' ),
                // Price
                Field::inst( 'subscriptions.total_price' ),
                // Start
                Field::inst( 'subscriptions.subscription_start' ),
                // End
                Field::inst( 'subscriptions.subscription_end' )->validator( function ( $val, $data, $opts )
                {
                    $date_start = strtotime($data['subscriptions']['subscription_start']);
                    $date_end   = strtotime($data['subscriptions']['subscription_end']);

                    return ($date_end > $date_start ? true : "Error: End date precedes start date");
                }),
                // Invoice ID
                Field::inst( 'subscriptions.invoice_id' ),
                // Invoice period
                Field::inst( 'subscriptions.invoice_periods_id' ),
                Field::inst( 'invoice_periods.description' ),
                // Renewal period
                Field::inst( 'subscriptions.status_id' ),
                Field::inst( 'statuses.description' ),
                // Status
                Field::inst( 'subscriptions.status_date' )
            )
            ->leftJoin( 'invoice_periods', 'invoice_periods.id', '=',  'subscriptions.invoice_periods_id')
            ->leftJoin( 'statuses', 'statuses.id', '=',  'subscriptions.status_id')
            ->leftJoin( 'companies', 'companies.id', '=',  'subscriptions.company_id')
            ->leftJoin( 'services', 'services.id', '=',  'subscriptions.service_id')
            ->leftJoin( 'service_categories', 'service_categories.id', '=',  'services.category_id')
            ->process( $_POST )
            ->data();

        $data['companies']          = Company::all(['id AS value', 'bedrijfsnaam AS label']);
        $data['services']           = Service::all(['id AS value', 'name AS label']);
        $data['service_categories'] = ServiceCategory::all(['id AS value', 'name AS label']);
        $data['statuses']           = Status::all(['id AS value', 'description AS label']);
        $data['invoice_periods']    = Period::all(['id AS value', 'description AS label']);

        return Response::json($data);
    }

    /**
     * [postRenewalSubscriptionData]
     * @return [json] [DT compatible object]
     */
    public function postRenewalSubscriptionData()
    {
        $all_posted_values = $_POST['values'];
        $posted_p = var_export($all_posted_values, true);

        $ret = (object) null;
        foreach($all_posted_values as $posted_ndx => $posted_values)
        {
            //error_log($posted_ndx);
            $curr_subscription = Subscription::find((int)$posted_values["subscriptions.id"]);
            if($curr_subscription)
            {
                $this->renewSubscription($curr_subscription);

            }
        }

        return Response::json($ret);
    }

    public function renewAll()
    {
        $renewals = Subscription::where('subscription_end', '<', date('Y-m-d'))
            ->where('status_id', '!=', Config::get('eenvoudcrm.subscriptions_status_terminated.id'))
            ->where('status_id', '!=', Config::get('eenvoudcrm.subscriptions_status_ended.id'))
            ->get();

        $ret = (object) null;
        foreach($renewals as $renewals_ndx => $curr_renewal)
        {
            $this->renewSubscription($curr_renewal);
        }

        return Response::json($ret);
    }

    public function postSubscriptionModelRenewal($subscription)
    {
        $ret = (object) null;
        $this->renewSubscription($subscription);

        return Response::json($ret);
    }

    public function renewSubscription($curr_subscription)
    {

        if(!array_key_exists($curr_subscription->status_id, $this->dateIntervals))
        {
            // what to do ???
            $ret = (object)['error' => 'Error: Invalid status_id for subscription $curr_subscription->id - $curr_subscription->status_id'];
            break;
        }

        $new_subscription = new Subscription;//clone $curr_subscription;
        //unset($new_subscription->id);

        $new_subscription->company_id = $curr_subscription->company_id;
        $new_subscription->service_id = $curr_subscription->service_id;
        $new_subscription->description = $curr_subscription->description;
        $new_subscription->price = $curr_subscription->price;
        $new_subscription->invoice_periods_id = $curr_subscription->invoice_periods_id;
        $new_subscription->status_id = $curr_subscription->status_id;

        $new_subscription->subscription_start = date("Y-m-d", strtotime($curr_subscription->subscription_end." +1 day"));
        $new_subscription->subscription_end   = date("Y-m-d", strtotime($curr_subscription->subscription_end.$this->dateIntervals[$curr_subscription->status_id]));
        $new_subscription->invoice_id         = null;
        $new_subscription->status_date        = date("Y-m-d");

        $new_subscription->total_price = $this->subscriptionTotalPrice($new_subscription->subscription_start,
            $new_subscription->subscription_end,
            $new_subscription->invoice_periods_id,
            $new_subscription->price);
        // prices update ???

        $new_subscription->save();

        error_log(json_encode($new_subscription));

        // disable old subscription
        $curr_subscription->status_id   = Config::get('eenvoudcrm.subscriptions_status_ended.id');
        $curr_subscription->status_date = date("Y-m-d");
        $curr_subscription->save();

        error_log(json_encode($curr_subscription));
    }

    /**
     * [postRenewalSubscriptionData]
     * @return [json] [DT compatible object]
     */
    public function postNieuwsbrievenSubscriptionData()
    {
        $posted_values = $_POST['data']['subscriptions'];
        $posted_p = var_export($_POST, true);
        error_log($posted_p);

        //error_log($posted_ndx);
        $curr_company     = Company::find((int)$posted_values["company_id"]);
        $subscription     = Subscription::find((int)$posted_values["id"]);
        $curr_aws_account = $posted_values["aws_auth"];

        if($curr_company && $subscription)
        {
            $aws_auth = CompanyMeta::firstOrNew([
                'company_id'=> $curr_company->id,
                'type'      => 'aws',
                'subtype'   => 'auth',
                'key'       => 'account'
            ]);

            $aws_auth->value = $curr_aws_account;
            $aws_auth->save();

            // load relations
            $load_curr_company  = $subscription->company;
            $load_curr_service  = $subscription->service;
            $load_curr_category = $subscription->service->category;
            $load_curr_status   = $subscription->status;
            $load_curr_period   = $subscription->period;

            $curr_company   = $subscription->company !== NULL ? (object) ['id' => $subscription->company_id, 'bedrijfsnaam' => utf8_encode($subscription->company->bedrijfsnaam)] : (object) null;
            $curr_service   = $subscription->service !== NULL ? (object) ['id' => $subscription->service_id, 'category_id' => $subscription->category_id, 'name' => utf8_encode($subscription->service->name)] : (object) null;
            $curr_category  = $subscription->service->category !== NULL ? (object) ['id' => $subscription->service->category_id, 'name' => utf8_encode($subscription->service->category->name)] : (object) null;
            $curr_status    = $subscription->status !== NULL ? (object) ['id' => $subscription->status_id, 'description' => utf8_encode($subscription->status->description)] : (object) null;
            $curr_period    = $subscription->period !== NULL ? (object) ['id' => $subscription->invoice_periods_id, 'description' => utf8_encode($subscription->period->description)] : (object) null;

            $data         = (object) ['DT_RowId' => 'row_'.$subscription->id, 'subscriptions' => $subscription, 'companies' => $curr_company, 'service_categories' => $curr_category, 'services' => $curr_service, 'statuses' => $curr_status, 'invoice_periods' => $curr_period ];

            $ret = [
                'row'               => $data,
                'companies'          => $this->getAllCompanies(),
                'services'           => $this->getAllServices(),
                'service_categories' => $this->getAllServiceCategories(),
                'statuses'           => $this->getAllStatuses(),
                'invoice_periods'    => $this->getAllInvoicePeriods()
            ];

            return Response::json($ret);
        }

        return Response::json((object) null);
    }

    public function postCSVUpload()
    {

        $input = Input::all();
        error_log(json_encode($input));

        // validation
        $rules = array(
            'file' => 'mimes:csv,txt',
        );
        $validation = Validator::make($input, $rules);
        if ($validation->fails())
        {
            return Response::make($validation->errors->first(), 400);
        }

        // check for duplicates and move to uploads dir
        $file = Input::file('file');
        $destinationPath = 'uploads';
        $filename        = $file->getClientOriginalName();
        $file_path       = public_path().'/'.$destinationPath.'/'.$filename;

        // get rid of old entries
        Emailusage::where('filename', $filename)
            ->delete();

        // delete old file
        if(File::exists($file_path))
        {
            File::delete($file_path);
        }

        // move new file
        $upload_success = Input::file('file')->move($destinationPath, $filename);
        if($upload_success)
        {
            $handle = fopen($file_path, 'r');
            while (($line = fgetcsv($handle)) !== FALSE)
            {
                // aws account
                $curr_aws_account = $line[1];

                // 1st line of col labels
                if(!is_numeric($curr_aws_account))
                {
                    //error_log($curr_aws_account." not numeric ):");
                    continue;
                }
                $cat_cmp = strcmp($line[4], 'Amazon Simple Email Service');
                if($cat_cmp !== 0)
                {
                    //error_log($cat_cmp." Cat not relevant ".$line[4]);
                    continue;
                }

                $mail_service_cmp        = strpos(strtolower($line[5]), strtolower('Cost per recipient of SendEmail'));
                $attachments_service_cmp = strpos(strtolower($line[5]), strtolower('Cost per GB of attachments'));
                if($mail_service_cmp === false && $attachments_service_cmp === false)
                {
                    error_log($service_cmp." Service not relevant ".$line[5]);
                    continue;
                }

                //$line is an array of the csv elements
                $num_columns = count($line);
                error_log(">>> LINE ".json_encode($line));

                // get the corresponding company_id
                $company_meta = CompanyMeta::where('type', 'aws')
                    ->where('subtype', 'auth')
                    ->where('key', 'account')
                    ->where('value', $curr_aws_account)
                    ->first();

                $company_id = -1;
                if($company_meta)
                {
                    $company_id = $company_meta->company_id;
                    error_log($company_id." Company FOUND :)");
                }
                // Error no company found
                if($company_id === -1)
                {
                    error_log("Company NOT found ):");
                    continue;
                }

                // use start date for period
                $curr_period = explode(" ", $line[2])[0];
                error_log("Curr period ".$curr_period);

                // make sure day is 1st of the month
                // so that date can de used as a month tag ?
                //

                // get the subscription
                $email_subscription = Subscription::where("service_id", Config::get('eenvoudcrm.nieuwsbrieven_service_id'))
                    ->where('company_id', $company_id)
                    ->first();

                if(!$email_subscription)
                {
                    error_log("Consistency check falure - no nieuwsbrieven subscription (28) found");
                    continue;
                }

                $mail_bill_type = ($mail_service_cmp === false ? 'attach' : 'mail');
                // search emailusage table for already existing entries
                $curr_emailusage = Emailusage::where('type', $mail_bill_type)
                    ->where('period', '=', $curr_period)
                    ->where('subscription_id', '=', $email_subscription->id)
                    ->first();

                // if they exist update
                if($curr_emailusage)
                {
                    //update
                    error_log('update '.json_encode($curr_emailusage));
                    $curr_emailusage->type     = $mail_bill_type;
                    $curr_emailusage->cnt      = $line[6];
                    $curr_emailusage->filename = $filename;
                    $curr_emailusage->save();
                }
                // otherwise create
                else
                {
                    // get the subscription
                    $email_subscription = Subscription::whereRaw("service_id=".Config::get('eenvoudcrm.nieuwsbrieven_service_id')." AND company_id=$company_id")
                          ->first();

                    error_log('create '.json_encode($email_subscription));
                    if($email_subscription)
                    {
                        $curr_emailusage = new Emailusage();
                        $curr_emailusage->type            = $mail_bill_type;
                        $curr_emailusage->subscription_id = $email_subscription->id;
                        $curr_emailusage->period          = $curr_period;
                        $curr_emailusage->cnt             = $line[6];
                        $curr_emailusage->filename        = $filename;
                        $curr_emailusage->save();
                        error_log(json_encode($curr_emailusage));
                    }
                    else
                    {
                        error_log("No niewsbrieven subscriptions for ".$company_id);
                    }
                }
            }

            return Response::json([
                'success'   => 'success',
                'reload'    => true
            ]);
        }
    }
}
