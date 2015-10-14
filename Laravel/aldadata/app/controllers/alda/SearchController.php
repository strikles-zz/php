<?php

class SearchController extends BaseController
{
	public function __construct()
	{
		$this->name = 'search';

		$this->validationRules = [
    	];

    	$this->validationMessages = [
    	];
	}

	public function getIndex()
	{
		$title = 'Search';

		$company_results = Company::select('companies.*', 'c.name as country', 'a.city as city')
			->join('adresses as a', 'companies.address_id', '=', 'a.id')
			->join('countries as c', 'a.country_id', '=', 'c.id')
			->orderBy('companies.id', 'DESC')
			->take(5)
			->get();

		$company_data = [];

		foreach($company_results as $curr_company)
		{
			$curr_company   = (object) ['DT_RowId' => $curr_company->id, 'name' => $curr_company->name, 'references' => $curr_company->references, 'country' => $curr_company->country, 'city' => $curr_company->city ];
			$curr_entry     = (object) $curr_company;
			$company_data[] = $curr_entry;
		}
		$company_init = json_encode([ 'data' => $company_data ]);

		$venue_results = Venue::select('venues.*', 'c.name as country', 'a.city as city')
			->join('adresses as a', 'venues.address_id', '=', 'a.id')
			->join('countries as c', 'a.country_id', '=', 'c.id')
			->orderBy('venues.id', 'DESC')
			->take(5)
			->get();

		$venue_data = [];
		foreach($venue_results as $curr_venue)
		{
			$curr_venue     = (object) ['DT_RowId' => $curr_venue->id, 'name' => $curr_venue->name, 'capacity' => $curr_venue->capacity, 'rigging_capacity' => $curr_venue->rigging_capacity, 'country' => $curr_venue->country, 'city' => $curr_venue->city ];
			$curr_entry     = (object) $curr_venue;
			$venue_data[]   = $curr_entry;
		}
        		$venue_init = json_encode([ 'data' => $venue_data ]);

		$contact_results = Contact::select('contacts.*', 'c.name as country')
			->join('adresses as a', 'contacts.address_id', '=', 'a.id')
			->join('countries as c', 'a.country_id', '=', 'c.id')
			->orderBy('contacts.id', 'DESC')
			->take(5)
			->get();

		$contact_data = [];
		foreach($contact_results as $curr_contact)
		{
			$curr_contact   = (object) ['DT_RowId' => $curr_contact->id, 'first_name' => $curr_contact->first_name, 'last_name' => $curr_contact->last_name, 'country' => $curr_contact->country, 'function' => $curr_contact->function ];
			$curr_entry     = (object) $curr_contact;
			$contact_data[] = $curr_entry;
		}
		$contact_init = json_encode([ 'data' => $contact_data ]);

		return View::make('site/' . $this->name . '/index', compact('title', 'company_init', 'venue_init', 'contact_init'));
	}

	public function getCompanyResults()
	{
		$company = array();
		$company['name'] 			= Input::get('name');
		$company['country'] 		= Input::get('country');
		$company['city']	 		= Input::get('city');
		$company['references'] 		= Input::get('references');

		$company_results = Company::select('companies.*', 'c.name as country', 'a.city AS city')
			->join('adresses AS a', 'companies.address_id', '=', 'a.id')
			->join('countries AS c', 'a.country_id', '=', 'c.id');

		if(empty(Input::get('name')) && empty(Input::get('country')) && empty(Input::get('city')) && empty(Input::get('references')))
		{
			$company_results->orderBy('companies.id', 'DESC')
				->take(5);
		}
		else
		{
			if(!empty(Input::get('name')))
			{
				$company_results->where('companies.name', 'LIKE', '%'.$company['name'].'%');
			}
			if(!empty(Input::get('references')))
			{
				$company_results->where('companies.references', 'LIKE', '%'.$company['references'].'%');
			}
			if(!empty(Input::get('city')))
			{
				$city_search_terms = explode(',', Input::get('city'));
				$city_where_str = "";
				for($city_ndx = 0; $city_ndx < count($city_search_terms); $city_ndx++)
				{
					if($city_ndx !== 0)
					{
						$city_where_str .= " OR a.city LIKE '%".$city_search_terms[$city_ndx]."%' ";
					}
					else
					{
						$city_where_str .= " a.city LIKE '%".$city_search_terms[$city_ndx]."%' ";
					}
				}

				$company_results->whereRaw("(".$city_where_str.")");
			}
			if(!empty(Input::get('country')))
			{
				$country_search_terms = explode(',', Input::get('country'));
				$country_where_str = "";
				for($country_ndx = 0; $country_ndx < count($country_search_terms); $country_ndx++)
				{
					if($country_ndx !== 0)
					{
						$country_where_str .= " OR c.name LIKE '%".$country_search_terms[$country_ndx]."%' ";
					}
					else
					{
						$country_where_str .= " c.name LIKE '%".$country_search_terms[$country_ndx]."%' ";
					}
				}

				$company_results->whereRaw("(".$country_where_str.")");
			}
		}

		$company_results = $company_results->get();

		$data = [];
		foreach($company_results as $curr_company)
		{
			$curr_company   = (object) ['DT_RowId' => $curr_company->id, 'name' => $curr_company->name, 'references' => $curr_company->references, 'country' => $curr_company->country, 'city' => $curr_company->city ];
			$curr_entry     = (object) $curr_company;
			$data[]         = $curr_entry;
		}

		echo json_encode([ 'data' => $data ]);
	}

	public function getVenueResults()
	{
		$venue = array();
		$venue['name'] 				= Input::get('name');
		$venue['country']			= Input::get('country');
		$venue['city']				= Input::get('city');
		$venue['min_capacity'] 		= Input::get('min_capacity');
		$venue['max_capacity'] 		= Input::get('max_capacity');
		$venue['min_rig_capacity'] 	= Input::get('min_rig_capacity');

		$venue_results = Venue::select('venues.*', 'c.name as country', 'a.city as city')
			->join('adresses as a', 'venues.address_id', '=', 'a.id')
			->join('countries as c', 'a.country_id', '=', 'c.id');

		if(empty(Input::get('name')) && empty(Input::get('country')) && empty(Input::get('city')) && empty(Input::get('min_capacity')) && empty(Input::get('max_capacity')) && empty(Input::get('min_rig_capacity')))
		{
			$venue_results->orderBy('venues.id', 'DESC')
				->take(5);
		}
		else
		{
			if(!empty(Input::get('name')))
			{
				$venue_results->where('venues.name', 'LIKE', '%'.$venue['name'].'%');
			}
			if(!empty(Input::get('min_capacity')))
			{
				$venue_results->whereRaw('CAST(venues.capacity AS SIGNED) > ' . (int)$venue['min_capacity']);
			}
			if(!empty(Input::get('max_capacity')))
			{
				$venue_results->whereRaw('CAST(venues.capacity AS SIGNED) < ' . (int)$venue['max_capacity']);
			}
			if(!empty(Input::get('min_rig_capacity')))
			{
				$venue_results->whereRaw('CAST(venues.rigging_capacity AS SIGNED) > ' . (int)$venue['min_rig_capacity']);
			}
			if(!empty(Input::get('city')))
			{
				$city_search_terms = explode(',', Input::get('city'));
				$city_where_str = "";
				for($city_ndx = 0; $city_ndx < count($city_search_terms); $city_ndx++)
				{
					if($city_ndx !== 0)
					{
						$city_where_str .= " OR a.city LIKE '%".$city_search_terms[$city_ndx]."%' ";
					}
					else
					{
						$city_where_str .= " a.city LIKE '%".$city_search_terms[$city_ndx]."%' ";
					}
				}

				$venue_results->whereRaw("(".$city_where_str.")");
			}
			if(!empty(Input::get('country')))
			{
				$country_search_terms = explode(',', Input::get('country'));
				$country_where_str = "";
				for($country_ndx = 0; $country_ndx < count($country_search_terms); $country_ndx++)
				{
					if($country_ndx !== 0)
					{
						$country_where_str .= " OR c.name LIKE '%".$country_search_terms[$country_ndx]."%' ";
					}
					else
					{
						$country_where_str .= " c.name LIKE '%".$country_search_terms[$country_ndx]."%' ";
					}
				}

				$venue_results->whereRaw("(".$country_where_str.")");
			}
		}

		$venue_results = $venue_results->get();

		$data = [];
		foreach($venue_results as $curr_venue)
		{
			$curr_venue = (object) ['DT_RowId' => $curr_venue->id, 'name' => $curr_venue->name, 'capacity' => $curr_venue->capacity, 'rigging_capacity' => $curr_venue->rigging_capacity, 'country' => $curr_venue->country, 'city' => $curr_venue->city ];
			$curr_entry = (object) $curr_venue;
			$data[]	 	= $curr_entry;
		}

		echo json_encode([ 'data' => $data ]);
	}

	public function getContactResults()
	{
		$contact = [];
		$contact['first_name']	= Input::get('first_name');
		$contact['last_name']	= Input::get('last_name');
		$contact['country'] 	= Input::get('country');
		$contact['function'] 	= Input::get('function');

		$contact_results = Contact::select('contacts.*', 'c.name as country')
			->join('adresses as a', 'contacts.address_id', '=', 'a.id')
			->join('countries as c', 'a.country_id', '=', 'c.id');

		if(empty(Input::get('first_name')) && empty(Input::get('last_name')) && empty(Input::get('country')) && empty(Input::get('function')))
		{
			$contact_results->orderBy('contacts.id', 'DESC')
				->take(5);
		}
		else
		{
			if(!empty(Input::get('first_name')))
			{
				$contact_results->where('contacts.first_name', 'LIKE', '%'.$contact['first_name'].'%');
			}
			if(!empty(Input::get('last_name')))
			{
				$contact_results->where('contacts.last_name', 'LIKE', '%'.$contact['last_name'].'%');
			}
			if(!empty(Input::get('function')))
			{
				$contact_results->where('contacts.function', 'LIKE', '%'.$contact['function'].'%');
			}
			if(!empty(Input::get('country')))
			{
				$country_search_terms = explode(',', Input::get('country'));
				$country_where_str = "";
				for($country_ndx = 0; $country_ndx < count($country_search_terms); $country_ndx++)
				{
					if($country_ndx !== 0)
					{
						$country_where_str .= " OR c.name LIKE '%".$country_search_terms[$country_ndx]."%' ";
					}
					else
					{
						$country_where_str .= " c.name LIKE '%".$country_search_terms[$country_ndx]."%' ";
					}
				}

				$contact_results->whereRaw("(".$country_where_str.")");
			}
		}

		$contact_results = $contact_results->get();

		$data = [];
		foreach($contact_results as $curr_contact)
		{
			$curr_contact   	= (object) ['DT_RowId' => $curr_contact->id, 'first_name' => $curr_contact->first_name, 'last_name' => $curr_contact->last_name, 'country' => $curr_contact->country, 'function' => $curr_contact->function ];
			$curr_entry     	= (object) $curr_contact;
			$data[]         	= $curr_entry;
		}

		echo json_encode([ 'data' => $data ]);
	}
}