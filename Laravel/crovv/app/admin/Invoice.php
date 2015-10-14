<?php

// Invoices
Admin::model('\App\Invoice')
	->title('Invoices')
	->as('invoices')
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
	Column::string('price', 'Price');
	Column::string('description', 'Description');
	Column::date('created_at', 'Created');

})->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::textAddon('price', 'Price')->addon('$')->placement('after');
	FormItem::text('description', 'Description');

});
