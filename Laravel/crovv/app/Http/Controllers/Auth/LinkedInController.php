<?php namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use App\User;

class LinkedInController extends AuthController {

	// revisit: http://www.codeanchor.net/blog/complete-laravel-socialite-tutorial/

	public function login()
	{
		return \Socialize::with('linkedin')->redirect();
	}

	public function updateUser($linkedinUser)
	{

	}

	public function callback()
	{
		$linkedin_user = \Socialize::with('linkedin')->user();
		error_log(json_encode($linkedin_user->id));

		$user = \App\User::where('provider_id', $linkedin_user->id)->first();
		error_log(json_encode($user));

		if(!$user)
		{
			$user = \App\User::create([
				'email' => $linkedin_user->email,
				'photo' => $linkedin_user->avatar,
				'name' => $linkedin_user->name,
				'confirmed' => 1,
				'provider' => 'linkedin',
				'provider_id' => $linkedin_user->id
			]);

			error_log(json_encode($user));
		}
		else
		{
			$user->update([
				'email' => $linkedin_user->email,
				'photo' => $linkedin_user->avatar,
				'name' => $linkedin_user->name,
				'confirmed' => 1,
				'provider' => 'linkedin',
				'provider_id' => $linkedin_user->id
			]);

			error_log(json_encode($user));
		}

		\Auth::login($user, true);

		return redirect('/dashboard');
	}
}
