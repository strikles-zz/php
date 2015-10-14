<?php namespace App\Http\Controllers;

class RegistrationController extends Controller {

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
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('site.registration.index');
	}

    public function confirm($confirmation_code)
    {
    	error_log("confirm running ?");
        if(!$confirmation_code)
        {
        	error_log("No confirmation code");
            throw new InvalidConfirmationCodeException;
        }

        $user = \App\User::where('confirmation_code', $confirmation_code)->first();
        if (!$user)
        {
        	error_log("No user found");
            throw new InvalidConfirmationCodeException;
        }

		$user->confirmed         = 1;
		$user->confirmation_code = null;

        error_log("New User ".json_encode($user));
        $user->save();

        return redirect('/auth/login');
    }
}
