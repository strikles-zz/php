<?php

// Invoices
Admin::model('\App\Plan')
	->title('Plans')
	->as('plans')
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
	Column::string('title', 'Title');
	Column::string('price', 'Price');
	Column::string('description', 'Description');
	Column::string('content', 'Content');
	Column::date('created_at', 'Created');

})->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::text('title', 'Title');
	FormItem::textAddon('price', 'Price')->addon('$')->placement('after');
	FormItem::text('description', 'Description');
	FormItem::ckeditor('content', 'Content');

});
