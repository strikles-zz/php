<?php

// Invoices
Admin::model('\App\Subscription')
	->title('Subscriptions')
	->as('subscriptions')
	->with('user')
	->with('invoice')
	->denyCreating(function ()
{
	// Deny creating on thursday
	return false;

})->denyEditingAndDeleting(function ($instance)
{
	// deny editing and deleting rows when this is true
	return false;

})->filters(function ()
{
	//ModelItem::filter('user_id')->name()->from('\User');

})->columns(function ()
{
	// Describing columns for table view
	Column::string('user.name', 'User');
	Column::string('invoice.description', 'Invoice');
	Column::date('start_date', 'Start Date');
	Column::date('end_date', 'End Date');
	Column::date('created_at', 'Created');

})->form(function ()
{
	FormItem::select('user_id', 'Users')->list(\App\User::class);
	FormItem::select('invoice_id', 'Invoices')->list(\App\Invoice::class);
	FormItem::date('start_date', 'Start Date');
	FormItem::date('end_date', 'End Date');
});
