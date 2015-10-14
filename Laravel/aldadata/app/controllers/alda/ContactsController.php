<?php

class ContactsController extends CRUDController {


 	public function __construct() {

		$this->name = 'contacts';
		$this->modelName = 'Contact';
		$this->singleName = 'contact';

		$this->validationRules = [
    		'country'			=> 'exists:countries,name',
    		'address.email'		=> 'email'
    	];
    	$this->validationMessages = [
    		'country.exists'	=> 'Please select a country from the list',
    		'address.email.email'	=> 'Please enter a valid email address'
    	];

    	$this->dataTableColumns = ['id', 'last_name', 'first_name'];
	}

    protected function saveModel($contact = false) {

        if (Input::get('id')) {
            $contact = Contact::find(Input::get('id'));
        }
        if (!$contact) $contact = new Contact();

        $contact->function      = Input::get('function');
        $contact->first_name    = Input::get('first_name');
        $contact->last_name     = Input::get('last_name');
        $contact->references    = Input::get('references');
        $contact->notes         = Input::get('notes');

        $address = $contact->address()->first() ?: new Address();
        $address_input = Input::get('address');

        $country = Country::where('name', Input::get('country'))->first();
        if ($country) {
        	$address->country()->associate($country);
        }
        $address->address           = isset($address_input['address']) ? $address_input['address'] : '';
        $address->postal_code       = isset($address_input['postal_code']) ? $address_input['postal_code'] : '';
        $address->city              = isset($address_input['city']) ? $address_input['city'] : '';
        $address->state_province    = isset($address_input['state_province']) ? $address_input['state_province'] : '';
        $address->phone             = isset($address_input['phone']) ? $address_input['phone'] : '';
        $address->fax               = isset($address_input['fax']) ? $address_input['fax'] : '';
        $address->email             = isset($address_input['email']) ? $address_input['email'] : '';
        $address->website           = isset($address_input['website']) ? $address_input['website'] : '';
        $address->save();

        $contact->address()->associate($address);
        $contact->save();

        $parentQuery = Input::get('parent_model');
        if(!empty($parentQuery))
        {
        	$parentModel = null;
        	switch($parentQuery)
        	{
        		case 'events':
					$relation    = 'events';
					$parentModel = 'Events';
        			break;
        		case 'company':
					$relation    = 'companies';
					$parentModel = 'Company';
        			break;
        		case 'venue':
					$relation    = 'venues';
					$parentModel = 'Venue';
        			break;
        		default:
        			break;
        	}

        	if(!empty($parentModel))
        	{
        		$contact->$relation()->detach($parentModel::find(Input::get('parent_id')));
        		$contact->$relation()->attach($parentModel::find(Input::get('parent_id')));
        	}
        }

        return $contact;
    }


    protected function populateForm($model = false) {

    	//dd($model);

    	if ($model) {
	        $address = $model->address;
            $venues = $model->venues;
            $companies = $model->companies;

	        Former::populate( $model );
	        Former::populate( $model, $model->address );
	    } else {

	    	$address = [];

	    	$input = Input::All();
	    	Former::populate( $input);
	    	Former::populateField('address.email', $input['address']['email']);
	    	Former::populateField('address.phone', $input['address']['phone']);
	    	Former::populateField('address.country.name', $input['country']);
	    	Former::populateField('address.address', $input['address']['address']);
	    	Former::populateField('address.postal_code', $input['address']['postal_code']);
	    	Former::populateField('address.city', $input['address']['city']);
	    	Former::populateField('address.state_province', $input['address']['state_province']);
	    	Former::populateField('address.fax', $input['address']['fax']);
	    	Former::populateField('address.website', $input['address']['website']);
	    	//Former::populate( $input, $input );
	    }
    }


    // This is for the typeahead lookups, restfull routes are configured in routes.php (/api/v1/)
    public function index() {

		$datums = Contact::selectRaw('CONCAT(first_name, " ",  last_name) AS value')
				->addSelect('id', 'first_name', 'last_name', 'address_id', 'function');

		if (Input::get('q')) {
			$queryTokens = explode(' ', Input::get('q'));

			foreach ($queryTokens as $queryToken) {
				$datums = $datums->where(function($query) use ($queryToken) {
					$query->where('first_name', 'like', '%' . $queryToken . '%')
						->orWhere('last_name', 'like', '%' . $queryToken . '%');
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
				if ($country) {
					$datum->country = $country->name;
				}
			}

		}
		return Response::json($datums);
	}

	public function getDetails($contact) {

		$view = View::make('site/contacts/details');
		$view = $view->with(['contact' => $contact]);

		return $view;
	}

}
