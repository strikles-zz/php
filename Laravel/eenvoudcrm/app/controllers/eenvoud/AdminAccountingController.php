<?php

use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Join,
    DataTables\Editor\Validate;

class AdminAccountingController extends AdminCRUDController
{

    public function __construct()
    {
        $this->name         = 'accounting';

        $this->validationRules = [
        ];

        $this->validationMessages = [
        ];
    }

    /**
     * [getWorklogData - Fetches worklog db data and returns a json object compatible with DT]
     * @param  [string] $type   [processed/unprocessed values]
     * @return [json]           [DT compatible object]
     */
    public function getWorklogData($type, $company = null)
    {
        $Model = 'Werklog';


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

        $all_werklogs = Werklog::orderBy('worklogs.id', 'DESC');
        if($type === 'unprocessed')
        {
            $all_werklogs->whereNull('worklogs.strippenkaarten_id')
                ->WhereRaw('(worklogs.invoice_id IS NULL OR worklogs.invoice_id=0)');
        }
        elseif($type === 'processed')
        {
            $all_werklogs->whereNotNull('worklogs.strippenkaarten_id')
                ->orWhereRaw('(worklogs.invoice_id IS NOT NULL AND worklogs.invoice_id != 0)');
        }
        else
        {
            error_log('Error: No type specified');
        }

        if($company !== null)
        {
            $all_werklogs->where('worklogs.company_id', '=', (int)$company->id);
            if(!empty($search_value))
            {
                $all_werklogs->join('projects', 'worklogs.project_id', '=', 'projects.id')
                    ->whereRaw("(projects.name LIKE '%".$search_value."%')");
            }
        }
        else
        {
            if(!empty($search_value))
            {
                $all_werklogs->join('companies', 'worklogs.company_id', '=', 'companies.id')
                    ->join('projects', 'worklogs.project_id', '=', 'projects.id')
                    ->whereRaw("(projects.name LIKE '%".$search_value."%' OR companies.bedrijfsnaam LIKE '%".$search_value."%')");
            }
        }

        $recordsTotal    = $all_werklogs->count();
        $recordsFiltered = $recordsTotal;

        if($num_skip > 0)
        {
            $all_werklogs->skip($num_skip);
        }

        $all_werklogs = $all_werklogs->take($num_items)
                            ->get();

        $data = [];
        foreach($all_werklogs as $werklog)
        {
            // load relations
            $load_curr_company          = $werklog->company;
            $load_curr_project          = $werklog->project;
            $load_curr_user             = $werklog->user;
            $load_curr_strippenkaart    = $werklog->strippenkaart;

            $curr_worklog = $werklog;

            $curr_company   = $werklog->company !== NULL ? (object) ['id' => $werklog->company_id, 'bedrijfsnaam' => utf8_encode($werklog->company->bedrijfsnaam)] : (object) null;
            $curr_proj      = $werklog->project !== NULL ? (object) ['id' => $werklog->project_id, 'name' => utf8_encode($werklog->project->name)] : (object) null;

            $curr_strip     = ($werklog->strippenkaart !== NULL ?
                                (object) ['id' => $werklog->strippenkaarten_id, 'hours' => $werklog->strippenkaart->minutes] :
                                (object) null);

            $curr_user      = $werklog->user !== NULL ? (object) ['id' => $werklog->user_id, 'username' => utf8_encode($werklog->user->username)] : (object) null;
            $data[]         = (object) ['DT_RowId' => 'row_'.$werklog->id, 'worklogs' => $curr_worklog, 'users' => $curr_user, 'companies' => $curr_company, 'projects' => $curr_proj, 'strippenkaarten' => $curr_strip];
        }

        $ret = [
            'recordsTotal'    => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data'            => $data,
            'companies'       => $this->getAllCompanies(),
            'projects'        => $this->getAllProjects(),
            'users'           => $this->getAllUsers(),
            'strippenkaarten' => $this->getAllStrippenkaarten()
        ];

        return Response::json($ret);
    }

    /**
     * [getSubscriptionData - Fetches subscription DB data and returns a json object compatible with DT]
     * @param  [string] $type   [processed/unprocessed values]
     * @return [json]           [DT compatible object]
     */
    public function getSubscriptionData($type, $company = null)
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

        $terminated_id = Config::get('eenvoudcrm.subscriptions_status_terminated.id');
        $ended_id = Config::get('eenvoudcrm.subscriptions_status_ended.id');
        $all_subscriptions = Subscription::orderBy('subscriptions.id', 'DESC');

        if($company !== null)
        {
            $all_subscriptions->where('subscriptions.company_id', '=', $company->id);
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

        if($type === 'unprocessed')
        {
            $all_subscriptions->whereRaw('(subscriptions.invoice_id IS NULL AND subscriptions.status_id != '.$terminated_id.' AND subscriptions.status_id != '.$ended_id.')');
        }
        elseif($type === 'processed')
        {
            $all_subscriptions->whereRaw('(subscriptions.invoice_id IS NOT NULL OR subscriptions.status_id = '.$terminated_id.' OR subscriptions.status_id = '.$ended_id.')');
        }
        else
        {
            error_log('Error: No type specified');
            return;
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

            $curr_company   = $subscription->company !== NULL ? (object) ['id' => $subscription->company_id, 'bedrijfsnaam' => utf8_encode($subscription->company->bedrijfsnaam)] : (object) null;
            $curr_service   = $subscription->service !== NULL ? (object) ['id' => $subscription->service_id, 'category_id' => $subscription->category_id, 'name' => utf8_encode($subscription->service->name)] : (object) null;
            $curr_category  = $subscription->service->category !== NULL ? (object) ['id' => $subscription->service->category_id, 'name' => utf8_encode($subscription->service->category->name)] : (object) null;
            $curr_status    = $subscription->status !== NULL ? (object) ['id' => $subscription->status_id, 'description' => utf8_encode($subscription->status->description)] : (object) null;

            $data[]         = (object) ['DT_RowId' => 'row_'.$subscription->id, 'subscriptions' => $subscription, 'companies' => $curr_company, 'service_categories' => $curr_category, 'services' => $curr_service, 'statuses' => $curr_status ];
        }

        $ret = [
            'recordsTotal'       => $recordsTotal,
            'recordsFiltered'    => $recordsFiltered,
            'data'               => $data,
            'companies'          => $this->getAllCompanies(),
            'services'           => $this->getAllServices(),
            'service_categories' => $this->getAllServiceCategories(),
            'statuses'           => $this->getAllStatuses()
        ];

        return Response::json($ret);
    }

    /**
     * [segmentDataByCompany - segment posted data by company]
     * @param  [array] $all_posted_values   [Posted data]
     * @param  [string] $data_type          [worklog / subscription]
     * @return [array]                      [segmented data using company_id as assoc key]
     */
    public function segmentDataByCompany($all_posted_values, $data_type, $delete = false)
    {
        $segmented_data = [];
        foreach ($all_posted_values as $row_ndx => $row_values)
        {
            if(!isset($segmented_data[$row_values[$data_type.'.company_id']]))
            {
                // if no entry to selected company id exists create one and assign value
                $segmented_data[$row_values[$data_type.'.company_id']] = [];
            }

            if($data_type === 'subscriptions' && $delete === false)
            {
                $subs_id = $row_values['subscriptions.id'];
                $subscription = Subscription::find($subs_id);

                if($subscription && ($subscription->subscription_start !== "0000-00-00"))
                {
                    $segmented_data[$row_values[$data_type.'.company_id']][] = $row_values;
                }
            }
            else
            {
                $segmented_data[$row_values[$data_type.'.company_id']][] = $row_values;
            }
        }

        return $segmented_data;
    }

    /**
     * [postSubscriptionData - Process posted subscription data]
     * @return [json]       [DT compatible object]
     */
    public function postSubscriptionData()
    {
        error_log('>>> ALL POSTED subscription data '.json_encode($_POST));

        $all_posted_values = $_POST['values'];
        $op_type           = $_POST['type'];
        $segmented_data    = null;

        if($op_type === "invoice")
        {
            $segmented_data    = $this->segmentDataByCompany($all_posted_values, 'subscriptions', false);
            $mb = new IntegrationMoneybirdController2;
            foreach ($segmented_data as $company_ndx => $all_company_values)
            {
                $company_invoice = $mb->invoiceClient($all_company_values, $company_ndx, 'subscription');
                if($company_invoice && $company_invoice->id)
                {
                    foreach($all_company_values as $company_subscriptions_ndx => $company_subscription_values)
                    {
                        $subscription = Subscription::find((int)$company_subscription_values['subscriptions.id']);
                        if($subscription)
                        {
                            $subscription->invoice_id = $company_invoice->id;
                            $subscription->save();
                        }
                    }
                }
                else
                {
                    error_log('AAC: No $invoice');
                }
            }
        }
        elseif($op_type === "invoice_clear")
        {
            $segmented_data    = $this->segmentDataByCompany($all_posted_values, 'subscriptions', true);
            foreach ($segmented_data as $company_ndx => $all_company_values)
            {
                foreach($all_company_values as $company_subscriptions_ndx => $company_subscription_values)
                {
                    $subscription = Subscription::find((int)$company_subscription_values['subscriptions.id']);
                    if($subscription)
                    {
                        $subscription->invoice_id = null;
                        $subscription->save();
                    }
                }
            }
        }
        else
        {
            error_log('AAC: No $op_type');
        }

        return Response::json((object) null);
    }

    /**
     * [postWorklogData - process posted worklog data]
     * @return [json] [DT compatible object]
     */
    public function postWorklogData()
    {
        $all_posted_values = $_POST['values'];
        $op_type           = $_POST['type'];
        $segmented_data    = $this->segmentDataByCompany($all_posted_values, 'worklogs');

        if($op_type === "strippenkaarten")
        {
            foreach ($segmented_data as $company_ndx => $all_company_values)
            {
                foreach ($all_company_values as $company_worklog_ndx => $company_worklog_values)
                {
                    $worklog = Werklog::find((int)$company_worklog_values['worklogs.id']);
                    if($worklog)
                    {
                        $this->associateWorklogToStrippenkaart($worklog);
                    }
                }
            }
        }
        elseif($op_type === "strippenkaarten_clear")
        {
            foreach ($segmented_data as $company_ndx => $all_company_values)
            {
                foreach ($all_company_values as $company_worklog_ndx => $company_worklog_values)
                {
                    $worklog = Werklog::find((int)$company_worklog_values['worklogs.id']);
                    if($worklog)
                    {
                        $this->dissociateWorklogFromStrippenkaarts($worklog);
                    }
                }
            }
        }
        elseif($op_type === "invoice")
        {
            $mb = new IntegrationMoneybirdController2;
            foreach ($segmented_data as $company_ndx => $all_company_values)
            {
                $company_invoice = $mb->invoiceClient($all_company_values, $company_ndx, 'worklog');
                // update worklog
                if($company_invoice)
                {
                    foreach ($all_company_values as $company_worklog_ndx => $company_worklog_values)
                    {
                        $worklog = Werklog::find((int)$company_worklog_values['worklogs.id']);
                        if($worklog)
                        {
                            $worklog->invoice_id = $company_invoice->id;
                            $worklog->save();
                        }
                    }
                }
            }
        }
        elseif($op_type === "invoice_clear")
        {
            foreach ($segmented_data as $company_ndx => $all_company_values)
            {
                // clear worklog
                foreach ($all_company_values as $company_worklog_ndx => $company_worklog_values)
                {
                    $worklog = Werklog::find((int)$company_worklog_values['worklogs.id']);
                    if($worklog)
                    {
                        $worklog->invoice_id = null;
                        $worklog->save();
                    }
                }
            }
        }
        else
        {
            error_log('AAC: No $op_type');
        }

        return Response::json((object) null);
    }

    /**
     * [dissociateWorklogFromStrippenkaarts - dissociated a worklog from a given strippenkaart]
     * @param  [Eloquent model] $worklog [The worklog to be dissociated]
     * @return [boolean]          [success status]
     */
    public function dissociateWorklogFromStrippenkaarts($worklog)
    {
        if($worklog->strippenkaarten_id !== null)
        {
            // reset strippenkaart
            $associated_strippenkaart = Strippenkaart::find((int)$worklog->strippenkaarten_id);
            if($associated_strippenkaart)
            {
                $associated_strippenkaart->expiry_date = null;
                $associated_strippenkaart->save();
            }

            // uncheck worklog x to any strippenkaart:
            $worklog->strippenkaarten_id = null;
            $worklog->save();

            return true;
        }

        return false;
    }

    /**
     * [associateWorklogToStrippenkaart - attempt associating selected worklogs to strippenkaart]
     * @param  [Eloquent model] $worklog [The worklog to be associated]
     * @return [boolean]          [success status]
     */
    public function associateWorklogToStrippenkaart($worklog)
    {
        // find available strippenkart
        $all_strips = Strippenkaart::where('company_id', '=', (int)$worklog->company_id)
                                ->whereNull('expiry_date')
                                ->get();

        $available_strip = null;
        foreach($all_strips as $curr_strip)
        {
            //error_log($curr_strip->getMinutesLeftAttribute()." : ".$worklog->minutes);
            if($curr_strip->getMinutesLeftAttribute() >= $worklog->minutes)
            {
                $available_strip = $curr_strip;
                break;
            }
        }

        if($available_strip)
        {
            // invalidate strippenkaart
            if($available_strip->getMinutesLeftAttribute() === 0)
            {
                $available_strip->expiry_date = date("Y-m-d");
            }

            $available_strip->save();

            // associate worklog strippenkaart
            $worklog->strippenkaarten_id = $available_strip->id;
            $worklog->save();

            return true;
        }

        return false;
    }
}
