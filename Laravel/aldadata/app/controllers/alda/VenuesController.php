<?php

class VenuesController extends CRUDController {

	public function __construct() {

		$this->name = 'venues';
		$this->modelName = 'Venue';
		$this->singleName = 'venue';

		$this->validationRules = [
    		'country'	=> 'required|exists:countries,name'
    	];
    	$this->validationMessages = [
    		'country.exists'	=> 'Please select a country from the list'
    	];

    	$this->dataTableColumns = ['id', 'name', 'address_id'];
	}


    protected function saveModel($venue = false) {

        if (Input::get('id')) {
            $venue = Venue::find(Input::get('id'));
        }

        if (!$venue) $venue = new Venue();

    	$venue->name                                = Input::get('name');
        $venue->indoor_or_outdoor 	                = Input::get('indoor_or_outdoor');
    	$venue->name_of_hall		                = Input::get('name_of_hall');
        $venue->capacity                            = Input::get('capacity');
        $venue->dimension_height                    = Input::get('dimension_height');
        $venue->dimension_width                     = Input::get('dimension_width');
        $venue->dimension_length                    = Input::get('dimension_length');
        $venue->rigging_capacity                    = Input::get('rigging_capacity');

        $venue->notes                               = Input::get('notes');

        $address = $venue->address()->first() ?: new Address();
        $country = Country::where('name', Input::get('country'))->first();
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

        $venue->address()->associate($address);
        $venue->save();


   	    $venue->save();
        if (Input::get('company_id')) {
            $venue->companies()->detach(Company::find(Input::get('company_id')));
            $venue->companies()->attach(Company::find(Input::get('company_id')));
        }
        if (Input::get('contact_id')) {
            $venue->contacts()->detach(Contact::find(Input::get('contact_id')));
            $venue->contacts()->attach(Contact::find(Input::get('contact_id')));
        }

        return $venue;
    }

    public function populateForm($model = false) {

    	if ($model)
        {
	        $address = $model->address;
	        $contacts = $model->contacts;
	        $companies = $model->companies;

	        Former::populate( $model );
	        Former::populate( $model, $model->address );
	    }
        else
        {
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
				class="iframe btn btn-xs btn-default">{{{ Lang::get(\'button.edit\') }}}</a>',
			'<a href="{{{ URL::to(\'' . $this->name . '/\' . $id . \'/delete\' ) }}}" class="modal-popup btn btn-xs btn-danger">{{{ Lang::get(\'button.delete\') }}}</a>'
		];
        return Datatables::of($models)
            ->add_column('country', function($row) {
            	return Address::find($row->address_id)->country->name;
            })
            ->add_column('actions', implode('&nbsp;', $actions))
            ->remove_column('id')
            ->remove_column('address_id')
            ->make();
    }


    // This is for the typeahead lookups, restfull routes are configured in routes.php (/api/v1/)
    public function index() {

		$datums = Venue::selectRaw('name AS value')
				->addSelect('id', 'address_id', 'name_of_hall', 'indoor_or_outdoor');

		if (Input::get('q')) {
			$queryTokens = explode(' ', Input::get('q'));

			foreach ($queryTokens as $queryToken) {
				$datums = $datums->where(function($query) use ($queryToken) {
					$query->where('name', 'like', '%' . $queryToken . '%')
						->orWhere('name_of_hall', 'like', '%' . $queryToken . '%');
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

    // image uploads
    public function postUpload($model){

        $input = Input::all();

        eerror_log(json_encode($input));
        $rules = array(
            'file' => 'image|max:3000',
        );
        $validation = Validator::make($input, $rules);
        if ($validation->fails())
        {
            return Response::make($validation->errors->first(), 400);
        }

        $file = Input::file('file');
        $destinationPath = 'uploads/venues/'.$model->id;

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        //$filename = str_random(12);
        $filename = date("d").'-'.Str::random(8).$file->getClientOriginalName();
        eerror_log(public_path().'/'.$destinationPath.'/'.$filename);

        $pic_exists_fs = File::exists(public_path().'/'.$destinationPath.'/'.$filename);
        $pic_exists_db = $model->pictures()->where('filename', '=', $filename)->whereNull('deleted_at')->first();

        if($pic_exists_db || $pic_exists_fs)
        {
            return Response::json([
                'error' => 'error',
                'reload'    => false
            ]);
        }

        $upload_success = Input::file('file')->move($destinationPath, $filename);

        $picture = new Picture;
        $picture->filename   = $filename;
        $picture->user_id    = Auth::user()->id;
        $picture->save();

        $model->pictures()->save($picture);

        if( $upload_success ) {
            // Redirect to the blog posts management page
            return Response::json([
                'success'   => 'success',
                'reload'    => true
            ]);
        } else {
            return Response::json([
                'error' => 'error',
                'reload'    => false
            ]);
        }
    }
}
