<?php

class CityController extends BaseController {

	public function index() {

		if (Input::get('q')) {
			$id = 1;
			$datums = Address::select('city AS value')
				->where('city', 'like', '%' . Input::get('q') . '%')
				->distinct()
				->take(50)
				->get();

			foreach ($datums as $datum) {
				//print_r($datum->toArray());
				$datum->tokens = explode(' ', $datum->value);
				$datum->id = $id;
				$id++;
			}

			return Response::json($datums);

		} else {

			return Response::json(Address::select('city AS value')
				->distinct()
				->orderBy('updated_at', 'DESC')
				->take(50)
				->get()
			);
		}
	}
}