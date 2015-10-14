<?php

// Invoices
Admin::model('\App\Administrator')
	->title('Administrators')
	->as('administrators')
	->denyCreating(function ()
{
	// Deny creating on thursday
	return false;

})->denyEditingAndDeleting(function ($instance)
{
	// deny editing and deleting rows when this is true
	return false;

})->columns(function ()
{
	// Describing columns for table view
	Column::string('username', 'Username');
	Column::date('created_at', 'Created');
	Column::date('updated_at', 'Updated');

})->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::text('username', 'Username');
	FormItem::password('password', 'Password');
});
