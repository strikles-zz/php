<?php

class HospitalityController extends CRUDController {


	public function __construct() {

		$this->name = 'hospitalities';
		$this->modelName = 'Hospitality';
		$this->singleName = 'hospitality';

		$this->validationRules = [

    	];
    	$this->validationMessages = [

    	];

    	$this->dataTableColumns = ['id', 'contact_id'];
	}

 	protected function saveModel($hospitality = false) {

        if (Input::get('id')) {
            $hospitality = Hospitality::find(Input::get('id'));
        }
        if (!$hospitality) $hospitality = new Hospitality();

        //$contact = Contact::where('last_name', Input::get('contact'))->first();
        if (Input::get('first_hotel_option')) {
	        $hotel1 = Hotel::where('name', Input::get('first_hotel_option'))->first();
	        $hospitality->first_hotel_distance_from_airport = Input::get('first_hotel_distance_from_airport');
	        if ($hotel1) {
	        	$hospitality->first_hotel_option()->associate($hotel1);
	        }
        }

        if (Input::get('second_hotel_option')) {
	        $hotel2 = Hotel::where('name', Input::get('second_hotel_option'))->first();
    	    $hospitality->second_hotel_distance_from_airport = Input::get('second_hotel_distance_from_airport');
    	    if ($hotel2) {
	        	$hospitality->second_hotel_option()->associate($hotel2);
	        }
    	}

		if (Input::get('venue_id')) {
			$venue = Venue::find(Input::get('venue_id'));
        	$hospitality->venue()->associate($venue);
        }

        $hospitality->save();

        return $hospitality;

    }

	public function populateForm($model = false) {

    	if ($model) {
	    	$hotel1 = $model->first_hotel_option()->first();
	        $hotel2 = $model->second_hotel_option()->first();
	        $contact = $model->contacts()->first();
	        $venue = $model->venues;

            eerror_log(json_encode($hotel1));

	        Former::populate( $model );
	        // Former::populateField('first_hotel_option', $hotel1['name']);
	        // Former::populateField('second_hotel_option', $hotel2['name']);

	    } else {
	    	$input = Input::All();
	    	Former::populate( $input);
	    }
    }

    public function postAssociateChild($model, $child_relation, $child) {


    	if ($child_relation == 'first_hotel_option' OR $child_relation == 'second_hotel_option') {
    		$child = Hotel::find($child);
    	}

     	if ($model->$child_relation()->find($child)) {
     		 return Response::json([
        		'error'	=> 'Already attached',
        		'reload'	=> false
        	]);
     	}

		$model->$child_relation()->associate($child);
        $model->save();

		 return Response::json([
        	'success'	=> 'success',
        	'reload'	=> true
        ]);

    }

}
