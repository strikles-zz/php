<?php

class HotelsController extends CRUDController {

	public function __construct() {

		$this->name = 'hotels';
		$this->modelName = 'Hotel';
		$this->singleName = 'hotel';

		$this->validationRules = [
    		'country'	=> 'required|exists:countries,name'
    	];
    	$this->validationMessages = [
    		'country.exists'	=> 'Please select a country from the list'
    	];

    	$this->dataTableColumns = ['id', 'name'];
	}


    protected function saveModel($hotel = false) {

        if (Input::get('id')) {
            $hotel = Hotel::find(Input::get('id'));
        }
        if (!$hotel) $hotel = new Hotel();

        $hotel->name              	= Input::get('name');
        $address 					= $hotel->address()->first() ?: new Address();
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

        $hotel->address()->associate($address);
        $hotel->save();

        return $hotel;

    }

	public function populateForm($model = false) {

    	if ($model) {
	    	$address = $model->address;
            $airports = $model->airports;

	        Former::populate( $model );
	        Former::populate( $model, $model->address );
	    } else {
	    	$input = Input::All();
	    	Former::populate( $input);
	    }
    }

    // This is for the typeahead lookups, restfull routes are configured in routes.php (/api/v1/)
    public function index() {

        $datums = Hotel::selectRaw('name AS value')
                ->addSelect('id');

        if (Input::get('q')) {
            $queryTokens = explode(' ', Input::get('q'));

            foreach ($queryTokens as $queryToken) {
                $datums = $datums->where(function($query) use ($queryToken) {
                    $query->where('name', 'like', '%' . $queryToken . '%');
                });
            }

        }

        $datums = $datums->distinct()->take(50)->get();

        foreach ($datums as $datum) {
            $datum->tokens = array_merge(explode(' ', $datum->value), [$datum->value]);
            $address = $datum->address()->first();

            if ($address) {

                $datum->email = $address->email;
                $country = $address->country()->first();
                $datum->country = $country->name;
            }

        }
        return Response::json($datums);
    }

}