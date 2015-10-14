<?php

// Pages
Admin::model('\App\Page')->title('Pages')->as('pages')->denyCreating(function ()
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
	Column::date('created_at', 'Created');

})->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::text('title', 'Title');
	FormItem::ckeditor('content', 'Content');
});
