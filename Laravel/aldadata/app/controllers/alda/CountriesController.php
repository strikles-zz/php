<?php

class CountriesController extends CRUDController {

	public function __construct() {

		$this->name = 'countries';
		$this->modelName = 'Country';
		$this->singleName = 'country';

		$this->validationRules = [
    	];
    	$this->validationMessages = [
    	];

    	$this->dataTableColumns = ['id', 'name', 'abbreviation'];
	}

    protected function saveModel($country = false) {

    	if (Input::get('id')) {
    		$country = Country::find(Input::get('id'));
    	}
        if (!$country) $country = new Country();

        $country->name 							= Input::get('name');
        $country->abbreviation					= Input::get('abbreviation');
        $country->visa_work_permit_required 	= Input::get('visa_work_permit_required');
        $country->visa_work_permit_procedure 	= Input::get('visa_work_permit_procedure');
        $country->notes 	 	 	 	 	 	= Input::get('notes');
        return $country;

    }

	public function populateForm($model = false) {

    	if ($model) {
    		//$venues = $model->venues;
	        //$tickets = $model->tickets;

	        Former::populate( $model );
	    } else {
	    	$input = Input::All();
	    	Former::populate( $input);
	    }
    }

 	/**
     * Show a list of all the users formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData() {

		$Model = $this->modelName;
		$models = $Model::select($this->dataTableColumns);
		$actions = [
			'<a href="{{{ URL::to(\'iframe\') }}}"
				data-action="edit"
				data-type="' . $this->name . '"
				data-id="{{ $id }}"
				data-url="{{{ URL::to(\'' . $this->name . '/\' . $id . \'/edit\' ) }}}"
				class="iframe btn btn-xs btn-default">{{{ Lang::get(\'button.edit\') }}}</a>'
		];
        return Datatables::of($models)
            ->add_column('actions', implode('&nbsp;', $actions))
            ->remove_column('id')
            ->make();
    }


    // This is for the typeahead lookups, restfull routes are configured in routes.php (/api/v1/)
    public function index() {

		if (Input::get('q')) {

			$datums = Country::select('name AS value', 'id', 'abbreviation')
				->where('name', 'like', '%' . Input::get('q') . '%')
				->take(50)
				->get();

			foreach ($datums as $datum) {
				//print_r($datum->toArray());
				$datum->tokens = explode(' ', $datum->value);
			}

			return Response::json($datums);

		} else {

			return Response::json(Country::select('name AS value','id', 'abbreviation')
				->orderBy('name', 'ASC')
				->get());
		}
	}
}
