<?php

class CompaniesController extends CRUDController {

    public function __construct() {

        $this->name = 'companies';
        $this->modelName = 'Company';
        $this->singleName = 'company';

        $this->validationRules = [
            'country'   => 'required|exists:countries,id'
        ];
        $this->validationMessages = [
            'country.exists'    => 'Please select a country from the list'
        ];

        $this->dataTableColumns = ['id', 'name', 'type'];
    }


    protected function saveModel($company = false) {

        if (Input::get('id')) {
            $company = Company::find(Input::get('id'));
        }
        if (!$company) $company = new Company();

        $company->name              = Input::get('name');
        $company->type              = Input::get('type');
        $company->references        = Input::get('references');
        $company->bank_details      = Input::get('bank_details');
        $company->tax_number        = Input::get('tax_number');
        $company->notes             = Input::get('notes');

        $address = $company->address()->first() ?: new Address();
        $country = Country::where('id', Input::get('country'))->first();
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

        $company->address()->associate($address);
        $company->save();

        if (Input::get('venue_id')) {
            $company->venues()->detach(Venue::find(Input::get('venue_id')));
            $company->venues()->attach(Venue::find(Input::get('venue_id')));
        }
        if (Input::get('contact_id')) {
            $company->contacts()->detach(Contact::find(Input::get('contact_id')));
            $company->contacts()->attach(Contact::find(Input::get('contact_id')));
        }
        if (Input::get('event_id')) {
            $company->events()->detach(Events::find(Input::get('event_id')));
            $company->events()->attach(Events::find(Input::get('event_id')));
        }

        return $company;
    }


    public function populateForm($model = false) {

        if ($model) {

            $addres = $model->address;
            $venues = $model->venues;
            $contacts = $model->contacts;

            Former::populate( $model );
            Former::populate( $model, $model->address );

        } else {

            $input = Input::All();
            Former::populate( $input);
        }
    }


    // This is for the typeahead lookups, restfull routes are configured in routes.php (/api/v1/)
    public function index() {

        $datums = Company::selectRaw('name AS value')
                ->addSelect('id', 'address_id', 'type');

        if (Input::get('q')) {
            $queryTokens = explode(' ', Input::get('q'));

            foreach ($queryTokens as $queryToken) {
                $datums = $datums->where(function($query) use ($queryToken) {
                    $query->where('name', 'like', '%' . $queryToken . '%')
                        ->orWhere('type', 'like', '%' . $queryToken . '%');
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

    public function getDetails($company) {

        $view = View::make('site/companies/details');
        $view = $view->with(['company' => $company]);

        return $view;
    }

}
