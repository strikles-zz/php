<?php namespace App\Http\Controllers;

class DashboardController extends Controller {

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
		$bodyclass = "app-dashboard";
		$user = \Auth::user();
		$user_groups = $user->groups()->get();

		$user_meetings_attended = \App\Groupmeetingattendees::where('user_id', $user->id)->get();
		$past_activities = [];
		$future_activities = [];

		foreach ($user_meetings_attended as $key => $uattended)
		{
			$group_meeting = \App\Groupmeeting::find($uattended->meeting_id);
			if($group_meeting)
			{
				error_log('Date AM - '.$group_meeting->meeting_date.' - '.date("Y-m-d H:i:s", strtotime($group_meeting->meeting_date)).' - '.date("Y-m-d H:i:s", strtotime('now')));
				// past
				if(strtotime($group_meeting->meeting_date) < strtotime('now'))
				{
					$past_activities[] = $group_meeting;
				}
				// future
				else
				{
					$future_activities[] = $group_meeting;
				}
			}
		}

		// error_log(json_encode($user));
		// error_log(json_encode($user_groups));
		return view('site.dashboard.index', compact('bodyclass', 'user', 'user_groups', 'past_activities', 'future_activities'));
	}
}
