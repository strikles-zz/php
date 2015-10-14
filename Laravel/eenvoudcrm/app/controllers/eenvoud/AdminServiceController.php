<?php

use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Join,
    DataTables\Editor\Validate;

class AdminServiceController extends AdminCRUDController
{
	public function __construct()
    {
        $this->name       = 'settings/services';
        $this->modelName  = 'Service';
        $this->singleName = 'service';

		$this->validationRules = [
            'name' => 'required'
    	];
    	$this->validationMessages = [
            'name.required' => 'Name is a required field'
    	];

    	$this->dataTableColumns = ['id', 'name', 'category_id', 'status_id', 'invoice_periods_id', 'default_monthly_costs', 'comment'];
	}

    /**
     * [saveModel - saves ou model info to the DB]
     * @param  boolean $service [description]
     * @return [Eloquent model] [service eloquent model]
     */
    protected function saveModel($service = false)
    {
        if(Input::get('id'))
        {
            $service = Service::find(Input::get('id'));
        }
        if(!$service) $service = new Service();

        $load_company_model = $service->companies;

        $service->name                  = Input::get('name');
        $service->category_id           = Input::get('category_id');
        $service->status_id             = Input::get('status_id');
        $service->invoice_periods_id    = Input::get('invoice_periods_id');
        $service->default_monthly_costs = Input::get('default_monthly_costs');
        $service->comment               = Input::get('comment');
        $service->save();

        return $service;
    }

    /**
     * [getServices - get all the services]
     * @return [type] [description]
     */
    public function getServices()
    {
        $all_services = Service::all(["id", "category_id", "status_id", "invoice_periods_id", "default_monthly_costs", "name"]);
        return Response::json($all_services);
    }

    /**
     * [getData - datatables response]
     * @return [json] [DT compatible object]
     */
    public function getData()
    {
        $Model = $this->modelName;

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

        $all_services = Service::orderBy('id', 'DESC');
        if(!empty($search_value))
        {
            $all_services->whereRaw("(services.name LIKE '%".$search_value."%')");
        }

        $recordsTotal    = $all_services->count();
        $recordsFiltered = $recordsTotal;

        if($num_skip > 0)
        {
            $all_services->skip($num_skip);
        }

        $all_services = $all_services->orderBy('id', 'DESC')
                            ->take($num_items)
                            ->get();

        $data = [];
        foreach($all_services as $service)
        {
            // load cat relation
            $load_curr_category = $service->category;
            $load_curr_status   = $service->status;
            $load_curr_period   = $service->period;
            //Debugbar::info($service);

            $curr_category  = $service->category !== NULL ? (object) ['id' => $service->category->id, 'name' => utf8_encode($service->category->name)] : (object) null;
            $curr_status    = $service->status !== NULL ? (object) ['id' => $service->status_id, 'description' => utf8_encode($service->status->description)] : (object) null;
            $curr_period    = $service->period !== NULL ? (object) ['id' => $service->invoice_periods_id, 'description' => utf8_encode($service->period->description)] : (object) null;

            $data[]         = (object) ['DT_RowId' => 'row_'.$service->id, 'service_categories' => $curr_category, 'services' => $service, 'statuses' => $curr_status, 'invoice_periods' => $curr_period ];
        }

        $ret = [
            'recordsTotal'       => $recordsTotal,
            'recordsFiltered'    => $recordsFiltered,
            'data'               => $data,
            'service_categories' => $this->getAllServiceCategories(),
            'statuses'           => $this->getAllStatuses(),
            'invoice_periods'    => $this->getAllInvoicePeriods()
        ];

        return Response::json($ret);
    }

    /**
     * [postData - handle company specific posted data]
     * @return [json] [DT compatible object]
     */
    public function postData()
    {
        $Model = $this->modelName;

        // Build our Editor instance and process the data coming from _POST
        global $db;
        $data = Editor::inst( $db, 'services' )
            ->fields(
                Field::inst( 'services.id' ),
                // Name
                Field::inst( 'services.name' ),
                // Cat
                Field::inst( 'services.category_id' ),
                Field::inst( 'service_categories.name' ),
                // Invoice
                Field::inst( 'services.invoice_periods_id' ),
                Field::inst( 'invoice_periods.description' ),
                // Status
                Field::inst( 'services.status_id' ),
                Field::inst( 'statuses.description' ),
                // costs
                Field::inst( 'services.default_monthly_costs' ),
                // Description
                Field::inst( 'services.comment' )

            )
            ->leftJoin( 'service_categories', 'service_categories.id', '=',  'services.category_id')
            ->leftJoin( 'statuses', 'statuses.id', '=',  'services.status_id')
            ->leftJoin( 'invoice_periods', 'invoice_periods.id', '=',  'services.invoice_periods_id')
            ->process( $_POST )
            ->data();

        $data['service_categories'] = ServiceCategory::all(['id AS value', 'name AS label']);
        $data['statuses']           = Status::all(['id AS value', 'description AS label']);
        $data['invoice_periods']    = Period::all(['id AS value', 'description AS label']);

        return Response::json($data);
    }
}
