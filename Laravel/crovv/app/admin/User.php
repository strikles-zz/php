<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

// Create admin model from User class with title and url alias
Admin::model('\App\User')
->title('Users')
//->with('roles')
->as('users')
->denyCreating(function ()
{
	// Deny creating on thursday
	//return date('w') == 4;
	return false;

})->denyEditingAndDeleting(function ($instance)
{
	// deny editing and deleting rows when this is true
	//return ($instance->id <= 2) || ($instance->email == 'admin');
	return false;

});
