<?php

class CountryController extends BaseController {

	public function getJson() {

		if (Input::get('q')) {

			$datums = Country::select('name AS value','id', 'abbreviation')
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
				->orderBy('updated_at', 'DESC')
				->take(50)
				->get());
		}
	}

}