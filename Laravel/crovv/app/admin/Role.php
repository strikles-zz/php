<?php

// Roles
Admin::model('\App\Role')->title('Roles')->as('roles')->denyCreating(function ()
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
	Column::string('name', 'Name');
	Column::string('display_name', 'Display Name');
	Column::string('description', 'Description');
	Column::date('created_at', 'Created');

})->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::text('name', 'Name');
	FormItem::text('display_name', 'Display Name');
	FormItem::text('description', 'Description');
});
