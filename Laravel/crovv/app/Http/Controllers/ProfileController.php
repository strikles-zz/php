<?php namespace App\Http\Controllers;

class ProfileController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = \Auth::user();

		return view('site.profile.index', compact('user'));
	}

	public function postProfile()
	{
		$user      = \Auth::user();
		$all_input = \Request::all();
		$user->update($all_input);

		// photo file input
		$photo_posted = isset($all_input['photo']);
		$photo_path = 'images/icons/default_user.png';
		if($photo_posted)
		{
			$photo_path = 'images/uploads/users/'.\Input::file('photo')->getClientOriginalName();
			\Image::make(\Input::file('photo'))->fit(100)->save($photo_path);
		}

		$user->update(['photo' => $photo_path]);

		return view('site.profile.index', compact('user'));
	}
}
