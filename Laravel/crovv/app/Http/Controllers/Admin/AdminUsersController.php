<?php namespace App\Http\Controllers\Admin;

use SleepingOwl\Admin\Admin;
use App\Http\Controllers\Controller;
use View;

class AdminUsersController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	protected $rules = array(
        'first_name' => 'required',
        'last_name' => 'required',
    );


	public function __construct()
	{
		//$this->middleware('admin');
	}

	public function index()
	{
		$all_users  = \App\User::all();
		$title = 'Users';
		$html = view('admin.users.table', compact('title', 'all_users'))->render();

		return Admin::view($html);
	}

	public function getEdit($user)
	{
		\AssetManager::addStyle(\URL::asset('chosen_v1.3.0/chosen.css'));
		\AssetManager::addScript(\URL::asset('chosen_v1.3.0/chosen.jquery.js'));
		\AssetManager::addScript(\URL::asset('js/chosenpicker.js'));

		$title = 'Users';
		$roles = $user->roles()->lists('id', 'name');
		error_log('>>> Roles '.json_encode($roles));
		$html = view('admin.users.edit', compact('title', 'user', 'roles'))->render();

		return Admin::view($html);
	}

	public function getCreate()
	{
		$title = 'Users';
		$html = view('admin.users.create', compact('title'))->render();

		return Admin::view($html);
	}

	public function postCreate()
	{
		$title = 'Users';
		$all_input = \Request::all();
		$create_rules = array(
			'first_name'            => 'required',
			'last_name'             => 'required',
			'email'                 => 'required|email|unique:users',
			'password'              => 'required|min:3|confirmed',
			'password_confirmation' => 'required|min:3'
	    );

		$validator = \Validator::make($all_input, $create_rules);

		if ($validator->passes())
		{
			// create a new user
			$user = new \App\User;
			$user->save();
			// update with vals
			$user->update($all_input);

			// set name
			$user->name = $all_input['first_name'].' '.$all_input['last_name'];
			// set pass hash
			$user->password = \Hash::make($all_input['password']);

			$user->photo = 'images\icons\default_user.png';

			// reset confirmation
			if(isset($all_input['confirmed']))
			{
				$user->confirmed = 1;
				$user->confirmation_code = "";
			}
			else
			{
				$user->confirmed = 0;
			}

			$user->update();

			error_log('User '.json_encode($all_input));
			return redirect("/admin/users/$user->id/update");
		}
		else
		{
			return redirect("/admin/users/create")->withErrors($validator);
		}


	}

	public function postEdit($user)
	{
		$all_input = \Request::all();
		$edit_rules = array(
			'first_name'            => 'required',
			'last_name'             => 'required',
			'email'                 => 'required|email'
	    );

		$validator = \Validator::make($all_input, $edit_rules);

		if ($validator->passes())
		{
			// save old password
			$old_password = $user->password;
			// update with all input
			$user->update($all_input);
			//restore old pw
			$user->password = $old_password;

			// set name alias
			$user->name = $all_input['first_name'].' '.$all_input['last_name'];
			// set password only if posted
			if(isset($all_input['password']) && !empty($all_input['password']))
			{
				$user->password = \Hash::make($all_input['password']);
			}

			// reset confirmation
			if(isset($all_input['confirmed']))
			{
				$user->confirmed = 1;
				$user->confirmation_code = "";
			}
			else
			{
				$user->confirmed = 0;
			}

			$user->update();

			error_log("U ".json_encode($user));
			error_log("I ".json_encode($all_input));

			return redirect("/admin/users/$user->id/update");
		}
		else
		{
			return redirect("/admin/users/$user->id/update")->withErrors($validator);
		}
	}

	public function delete($user)
	{
		$user->delete();

		$all_users = \App\User::all();
		$title = 'Users';
		$html = view('admin.users.table', compact('title', 'all_users'))->render();

		return Admin::view($html);
	}

}
