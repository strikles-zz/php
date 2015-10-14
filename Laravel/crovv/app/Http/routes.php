<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// model binding
Route::model('user', '\App\User');
Route::model('role', '\App\Role');
Route::model('group', '\App\Group');
Route::model('page', '\App\Page');


// json api
Route::group(['prefix' => 'api'], function()
{
    Route::group(['prefix' => 'users'], function()
    {
        Route::post('/{user}/groups/{group}/attach', 'Admin\AdminGroupsController@attachUserToGroup');
        Route::post('/{user}/groups/{group}/detach', 'Admin\AdminGroupsController@detachUserFromGroup');
    });
});

// sleepingowl admin
Route::group(['prefix' => 'admin'], function()
{
    Route::group(['prefix' => 'users'], function()
    {
        // admin users
        Route::get('/{user}/update', 'Admin\AdminUsersController@getEdit');
        Route::post('/{user}/update', 'Admin\AdminUsersController@postEdit');
        Route::post('/{user}/delete', 'Admin\AdminUsersController@delete');
        Route::get('/create', 'Admin\AdminUsersController@getCreate');
        Route::post('/create', 'Admin\AdminUsersController@postCreate');
        Route::get('/', 'Admin\AdminUsersController@index');

        // admin groups
        Route::get('/{user}/groups', 'Admin\AdminGroupsController@showUserGroups');
        Route::post('/{user}/groups', 'Admin\AdminGroupsController@postTest');
    });

    Route::group(['prefix' => 'groups'], function()
    {
        Route::get('/{group}/update', 'Admin\AdminGroupsController@getEdit');
        Route::post('/{group}/update', 'Admin\AdminGroupsController@postEdit');
        Route::post('/{group}/delete', 'Admin\AdminGroupsController@delete');
        Route::get('/create', 'Admin\AdminGroupsController@getCreate');
        Route::post('/create', 'Admin\AdminGroupsController@postCreate');
        Route::get('/', 'Admin\AdminGroupsController@index');
    });
});


// ??? - provided - ???
//Route::get('registration', 'RegistrationController@index');
//Route::get('signin', 'SigninController@index');


// groups
Route::group(['prefix' => 'groups'], function()
{
    // invite codes
    Route::get('/invite/{inviteCode}/chairman/accepts', 'GroupsController@chairmanAcceptsInvite');
    Route::get('/invite/{inviteCode}/chairman/denies', 'GroupsController@chairmanDeniesInvite');
    Route::get('/invite/{inviteCode}/user/accepts', 'GroupsController@userAcceptsInvite');
    Route::get('/invite/{inviteCode}/user/denies', 'GroupsController@userDeniesInvite');

    // invite
    Route::get('/{group}/invite', 'GroupsController@getInvite');
    Route::post('/{group}/invite', 'GroupsController@postInvite');

    // details page
    Route::get('{group}/details', 'GroupsController@getDetails');

    // attend
    Route::post('/{group}/attend', 'GroupsController@attendMeeting');

    // leave
    Route::post('/{group}/leave', 'GroupsController@leaveGroup');

    // notify group users
    // chairman only ???
    Route::post('{group}/notify', 'GroupsController@notifyUsers');

    // update
    Route::get('{group}/update', 'GroupsController@getEdit');
    Route::post('{group}/update', 'GroupsController@postEdit');

    // delete
    Route::post('{group}/delete', 'GroupsController@delete');

    // create
    Route::get('create', 'GroupsController@getCreate');
    Route::post('create', 'GroupsController@postCreate');

    Route::get('/', 'GroupsController@index');
});

// group slugs
// Route::bind('groups', function($value, $route) {
//     return App\Group::whereName($value)->first();
// });

// account confirmation
Route::get('register/verify/{confirmationCode}', 'RegistrationController@confirm');

Route::get('coming-soon', 'HomeController@comingSoon');
Route::get('contact', 'ContactController@index');
Route::get('dashboard', 'DashboardController@index');
Route::get('home', 'HomeController@index');
Route::get('how-to-use', 'HowToUseController@index');
Route::get('linkedin', 'Auth\LinkedInController@login');
Route::get('linkedin/callback', 'Auth\LinkedInController@callback');
Route::get('press', 'PressController@index');
Route::get('search', 'SearchController@getSearch');
Route::post('search', 'SearchController@postSearch');
Route::get('subscription', 'SubscriptionController@index');
Route::get('testimonial', 'TestimonialController@index');
Route::get('trial', 'TrialController@index');
Route::get('profile', 'ProfileController@index');
Route::post('profile', 'ProfileController@postProfile');

// pages
Route::resource('pages', 'PageController');
Route::bind('pages', function($value, $route) {
    return App\Page::whereTitle($value)->first();
});


// root fallback
Route::get('/', 'HomeController@index');


// ???
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
