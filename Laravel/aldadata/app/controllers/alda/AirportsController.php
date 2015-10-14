<?php

class AirportsController extends CRUDController {

	public function __construct() {

		$this->name = 'airports';
		$this->modelName = 'Airport';
		$this->singleName = 'airport';

		$this->validationRules = [
    		'country'	=> 'required|exists:countries,name'
    	];
    	$this->validationMessages = [
    		'country.exists'	=> 'Please select a country from the list'
    	];

    	$this->dataTableColumns = ['id', 'name', 'code'];
	}


    protected function saveModel($airport = false) {

        if (Input::get('id')) {
            $airport = Airport::find(Input::get('id'));
        }
        if (!$airport) $airport = new Airport();

        $airport->name              = Input::get('name');
        $address 					= $airport->address()->first() ?: new Address();
        $country 					= Country::where('name', Input::get('country'))->first();

        $address->country()->associate($country);

        $address->address           = Input::get('address_address');
        $address->postal_code       = Input::get('address_postal_code');
        $address->city              = Input::get('address_city');
        $address->state_province    = Input::get('address_state_province');
        $address->phone             = Input::get('address_phone');
        $address->fax               = Input::get('address_fax');
        $address->email             = Input::get('address_email');
        $address->website           = Input::get('address_website');
        $address->save();

        $airport->address()->associate($address);
        $hotel->save();

        return $airport;

    }

	public function populateForm($model = false) {

    	if ($model) {
	    	$address = $model->address;

	        Former::populate( $model );
	        Former::populate( $model, $model->address );
	    } else {
	    	$input = Input::All();
	    	Former::populate( $input);
	    }
    }



}