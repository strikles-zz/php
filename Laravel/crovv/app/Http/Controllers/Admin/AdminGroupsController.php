<?php namespace App\Http\Controllers\Admin;

use SleepingOwl\Admin\Admin;
use App\Http\Controllers\Controller;
use View;

class AdminGroupsController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */


	public function __construct()
	{
		//$this->middleware('admin');
	}

	public function index()
	{
		$all_groups  = \App\Group::with('users')->get();
		$title = 'Groups';
		$html = view('admin.groups.table', compact('title', 'all_groups'))->render();

		return Admin::view($html);
	}

	public function showUserGroups($user)
	{
		$title = 'Groups';
		$user_groups = $user->groups()->get();
		$all_groups  = \App\Group::all();
		$html = view('admin.users.groups', compact('title', 'user', 'user_groups', 'all_groups'))->render();

		return Admin::view($html);
	}

	public function getEdit($group)
	{
		\AssetManager::addStyle(\URL::asset('chosen_v1.3.0/chosen.css'));
		\AssetManager::addScript(\URL::asset('chosen_v1.3.0/chosen.jquery.js'));
		\AssetManager::addScript(\URL::asset('js/chosenpicker.js'));

		$title = 'Groups';
		$users = $group->users()->get();
		$gusers = $users->lists('name', 'id');

		error_log(json_encode($gusers));
		$html = view('admin.groups.edit', compact('title', 'group', 'gusers'))->render();

		return Admin::view($html);
	}

	public function getCreate()
	{

		$title = 'Groups';
		$html = view('admin.groups.create', compact('title'))->render();

		return Admin::view($html);
	}

	public function postCreate()
	{
		$title = 'Groups';

		$all_input = \Request::all();
		$group = \App\Group::create($all_input);

		$group->photo = 'images\icons\default_group.png';
		$group->update();

		error_log('Group '.json_encode($group));

		//return $this->getEdit($group);
		return redirect("/admin/groups/$group->id/update");
	}

	public function postEdit($group)
	{
		$all_input = \Request::all();
		$group->update($all_input);

		//return $this->getEdit($group);
		return redirect("/admin/groups/$group->id/update");
	}

	public function delete($group)
	{
		$group->delete();

		$all_groups = \App\Group::all();
		$title = 'Groups';
		$html = view('admin.groups.table', compact('title', 'all_groups'))->render();

		return Admin::view($html);
	}

	public function attachUserToGroup($user, $group) {

		$user->groups()->attach($group->id);

		return $this->showUserGroups($user);

	}

	public function detachUserFromGroup($user, $group) {

		$user->groups()->detach($group->id);

		return $this->showUserGroups($user);
	}

}
