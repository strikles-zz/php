<?php

/*
 * Describe your menu here.
 *
 * There is some simple examples what you can use:
 *
 * 		Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard')->uses('\AdminController@getIndex');
 * 		Admin::menu(User::class)->icon('fa-user');
 * 		Admin::menu()->label('Menu with subitems')->icon('fa-book')->items(function ()
 * 		{
 * 			Admin::menu(\Foo\Bar::class)->icon('fa-sitemap');
 * 			Admin::menu('\Foo\Baz')->label('Overwrite model title');
 * 			Admin::menu()->url('my-page')->label('My custom page')->uses('\MyController@getMyPage');
 * 		});
 */

//Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard')->uses('\SleepingOwl\Admin\Controllers\DummyController@getIndex');
Admin::menu()->url('/')->label('Start Page')->icon('fa-dashboard')->uses('\SleepingOwl\Admin\Controllers\DummyController@getIndex');
Admin::menu('\App\Page')->icon('fa-book');

Admin::menu()->label('User Management')->icon('fa-user')->items(function ()
{
    Admin::menu('\App\User')->label('Users')->icon('fa-user')->uses('\App\Admin\AdminUsersController@getIndex');
    Admin::menu('\App\Group')->label('Groups')->icon('fa-book')->uses('\App\Admin\AdminGroupsController@getIndex');
});

Admin::menu()->label('Settings')->icon('fa-user')->items(function ()
{
	Admin::menu('\App\Administrator')->icon('fa-user');
    Admin::menu('\App\Role')->icon('fa-group');
});

Admin::menu()->label('$')->icon('fa-user')->items(function ()
{
    Admin::menu('\App\Plan')->icon('fa-group');
    Admin::menu('\App\Subscription')->icon('fa-group');
    Admin::menu('\App\Invoice')->icon('fa-group');
});

