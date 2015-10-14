<?php

use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Join,
    DataTables\Editor\Validate;


class AdminStrippenkaartController extends AdminCRUDController
{
	public function __construct()
    {

		$this->name       = 'strippenkaarten';
		$this->modelName  = 'Strippenkaart';
		$this->singleName = 'strippenkaart';

		$this->validationRules = [
    	];

    	$this->validationMessages = [
    	];

    	$this->dataTableColumns = ['id', 'company_id', 'hours', 'price', 'invoice_id', 'invoice_code', 'entry_date', 'expiry_date'];
	}

    /**
     * [saveModel]
     * @param  boolean $strippenkaart [description]
     * @return [Eloquent model]       [the strippenkaart created/saved]
     */
    protected function saveModel($strippenkaart = false)
    {
        if(Input::get('id'))
        {
            $strippenkaart = Strippenkaart::find(Input::get('id'));
        }

        if (!$strippenkaart) $strippenkaart = new Strippenkaart();

        $strippenkaart->company_id           = Input::get('company_id');
        $strippenkaart->minutes              = Input::get('hours');
        $strippenkaart->price                = Input::get('price');
        $strippenkaart->expiry_date          = Input::get('expiry_date');
        $strippenkaart->save();

        return $strippenkaart;
    }

    /**
     * [getStrippenkaarten - all teh strippenkaarts]
     * @return [json] [all the strippenkaarten]
     */
    public function getStrippenkaarten()
    {
        $all_strip = Strippenkaart::all();
        return Response::json($all_strip);
    }

    /**
     * [getData - get all strippenkaart data]
     * @return [json] [DT cmpatible object]
     */
    public function getData($model = null)
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

        $all_strippenkaarten = Strippenkaart::orderBy('id', 'DESC');
        if($model !== null)
        {
            $all_strippenkaarten->where('strippenkaarten.company_id', '=', (int)$model->id);
            if(!empty($search_value))
            {
                $all_strippenkaarten->whereRaw("(strippenkaarten.hours LIKE '%".$search_value."%')");
            }
        }
        else
        {
            if(!empty($search_value))
            {
                $all_strippenkaarten->join('companies', 'projects.company_id', '=', 'companies.id')
                    ->whereRaw("(strippenkaarten.hours LIKE '%".$search_value."%' OR companies.bedrijfsnaam LIKE '%".$search_value."%')");
            }
        }

        $recordsTotal    = $all_strippenkaarten->count();
        $recordsFiltered = $recordsTotal;

        if($num_skip > 0)
        {
            $all_strippenkaarten->skip($num_skip);
        }

        $all_strippenkaarten = $all_strippenkaarten->take($num_items)
                                    ->get();

        $data = [];
        foreach($all_strippenkaarten as $strippenkaart)
        {
            // load relations
            $load_curr_company  = $strippenkaart->company;
            $curr_strippenkaart = $strippenkaart;

            $curr_company   = $strippenkaart->company !== NULL ? (object) ['id' => $strippenkaart->company_id, 'bedrijfsnaam' => utf8_encode($strippenkaart->company->bedrijfsnaam)] : (object) null;
            $data[]         = (object) ['DT_RowId' => 'row_'.$strippenkaart->id, 'strippenkaarten' => $curr_strippenkaart, 'companies' => $curr_company, 'minutes_left' => $strippenkaart->getMinutesLeftAttribute()];
        }

        $ret = [
            'recordsTotal'    => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data'            => $data,
            'companies'       => $this->getAllCompanies()
        ];

        return Response::json($ret);
    }

    /**
     * [postData - handle posted strippenkaart data]
     * @return [json] [DT compatible object]
     */
    public function postData()
    {
        $Model = $this->modelName;

        // Build our Editor instance and process the data coming from _POST
        global $db;
        $data = Editor::inst( $db, 'strippenkaarten' )
            ->fields(
                Field::inst( 'strippenkaarten.id' ),
                // Project
                Field::inst( 'strippenkaarten.company_id' ),
                Field::inst( 'companies.bedrijfsnaam' ),
                // Minutes
                Field::inst( 'strippenkaarten.hours' ),
                // Price
                Field::inst( 'strippenkaarten.price' ),
                // End
                Field::inst( 'strippenkaarten.expired_at' )
            )
            ->leftJoin( 'companies', 'companies.id', '=',  'strippenkaarten.company_id')
            ->process( $_POST )
            ->data();

        $data['companies'] = Company::all(['id AS value', 'bedrijfsnaam AS label']);

        return Response::json($data);
    }

    /**
     * [postModelData]
     * @param  [Eloquent model] $model [company model]
     * @return [json]        [DT compatible object]
     */
    public function postModelData($model)
    {
        $Model = $this->modelName;

        // Build our Editor instance and process the data coming from _POST
        global $db;
        $data = Editor::inst( $db, 'strippenkaarten' )
            ->fields(
                Field::inst( 'strippenkaarten.id' ),
                // Company
                Field::inst( 'strippenkaarten.company_id' ),
                // Minutes
                Field::inst( 'strippenkaarten.hours' ),
                // Price
                Field::inst( 'strippenkaarten.price' ),
                // Price
                Field::inst( 'strippenkaarten.invoice_id' ),
                // Price
                Field::inst( 'strippenkaarten.invoice_code' ),
                // End
                Field::inst( 'strippenkaarten.entry_date' ),
                // End
                Field::inst( 'strippenkaarten.expiry_date' )
            )
            ->process( $_POST )
            ->data();

        foreach ($data as $ndx => $value) {
            $strip_id              = (int)$value['strippenkaarten']['id'];
            $strippenkaart         = Strippenkaart::find($strip_id);
            $minutes_left          = $strippenkaart->getMinutesLeftAttribute();
            $value['minutes_left'] = $minutes_left;
            $data[$ndx]            = $value;
        }

        return Response::json($data);
    }
}
