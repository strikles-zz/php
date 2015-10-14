<?php

// Pages
Admin::model('\App\Group')
->title('Groups')
->as('groups')
//->with('users')
->denyCreating(function ()
{
	// Deny creating on thursday
	return false;

})->denyEditingAndDeleting(function ($instance)
{
	// deny editing and deleting rows when this is true
	return false;

});
