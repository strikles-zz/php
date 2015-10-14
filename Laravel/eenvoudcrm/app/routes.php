<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/** ------------------------------------------
 *  Route model binding
 *  ------------------------------------------
 */
Route::model('user', 'User');
Route::model('comment', 'Comment');
Route::model('post', 'Post');
Route::model('role', 'Role');
Route::model('company', 'Company');
Route::model('companymeta', 'CompanyMeta');
Route::model('werklog', 'Werklog');
Route::model('service', 'Service');
Route::model('period', 'Period');
Route::model('project', 'Project');
Route::model('reminder', 'Reminder');
Route::model('subscription', 'Subscription');
Route::model('strippenkaart', 'Strippenkaart');
Route::model('status', 'Status');

/** ------------------------------------------
 *  Route constraint patterns
 *  ------------------------------------------
 */
Route::pattern('comment', '[0-9]+');
Route::pattern('post', '[0-9]+');
Route::pattern('user', '[0-9]+');
Route::pattern('role', '[0-9]+');
Route::pattern('company', '[0-9]+');
Route::pattern('werklog', '[0-9]+');
Route::pattern('service', '[0-9]+');
Route::pattern('project', '[0-9]+');
Route::pattern('reminder', '[0-9]+');
Route::pattern('subscription', '[0-9]+');
Route::pattern('strippenkaart', '[0-9]+');
Route::pattern('token', '[0-9a-z]+');

Route::group(array('before' => 'auth'), function() {
	Route::resource('api/v1/companies', 'AdminCompanyController');
	Route::resource('api/v1/projects', 'AdminProjectController');
});

Route::resource('webhooks_worklogs', 'IntegrationJIRAController');



/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::group(array('prefix' => 'admin/integrations', 'before' => 'auth'), function() {

	Route::get('moneybird/sync-contacts', 'IntegrationMoneybirdController2@syncContacts');
    Route::get('moneybird/oauth', 'IntegrationMoneybirdController2@getAccessCode');
	Route::controller('moneybird', 'IntegrationMoneybirdController2');
});


Route::group(array('prefix' => 'admin', 'before' => 'auth'), function() {


    Route::controller('reporting', 'AdminReportingController');

    ////////////////
    // ACCOUNTING //
    ////////////////
    // subscriptions
    Route::get('accounting/subscriptions/data/{type}', 'AdminAccountingController@getSubscriptionData');
    Route::post('accounting/subscriptions/data', 'AdminAccountingController@postSubscriptionData');
    // worklogs
    Route::get('accounting/worklogs/data/{type}', 'AdminAccountingController@getWorklogData');
    Route::post('accounting/worklogs/data', 'AdminAccountingController@postWorklogData');
    // controller
    Route::controller('accounting', 'AdminAccountingController');

    /////////////////////
    // STRIPPENKAARTEN //
    /////////////////////
    Route::get('strippenkaarten/data', 'AdminStrippenkaartController@getData');
    Route::get('strippenkaarten/all', 'AdminStrippenkaartController@getStrippenkaarten');
    Route::get('strippenkaarten/{strippenkaart}/show', 'AdminStrippenkaartController@getShow');
    Route::get('strippenkaarten/{strippenkaart}/edit', 'AdminStrippenkaartController@getEdit');
    Route::post('strippenkaarten/{strippenkaart}/edit', 'AdminStrippenkaartController@postEdit');
    Route::get('strippenkaarten/{strippenkaart}/delete', 'AdminStrippenkaartController@getDelete');
    Route::post('strippenkaarten/{strippenkaart}/delete', 'AdminStrippenkaartController@postDelete');
    Route::controller('strippenkaarten', 'AdminStrippenkaartController');



    Route::get('subscriptions/nieuwsbrieven/data', 'AdminSubscriptionController@getNieuwsbrievenSubscriptionData');
    Route::post('subscriptions/nieuwsbrieven/data', 'AdminSubscriptionController@postNieuwsbrievenSubscriptionData');
    ////////////////////////////
    // SUBSCRIPTIONS Renewals //
    ////////////////////////////
    Route::get('subscriptions/renewals/data', 'AdminSubscriptionController@getRenewalSubscriptionData');
    Route::post('subscriptions/renewals/data', 'AdminSubscriptionController@postRenewalSubscriptionData');
    Route::get('subscriptions/renewals/all', 'AdminSubscriptionController@getRenewals');
    Route::get('renew', 'AdminSubscriptionController@renewAll');
    ///////////////////
    // SUBSCRIPTIONS //
    ///////////////////
    ///csv upload
    Route::post('subscriptions/csvupload', 'AdminSubscriptionController@postCSVUpload');

    Route::get('subscriptions/data', 'AdminSubscriptionController@getData');
    Route::get('subscriptions/all', 'AdminSubscriptionController@getSubscriptions');
    Route::get('subscriptions/{subscription}/show', 'AdminSubscriptionController@getShow');
    Route::get('subscriptions/{subscription}/edit', 'AdminSubscriptionController@getEdit');
    Route::post('subscriptions/{subscription}/edit', 'AdminSubscriptionController@postEdit');
    Route::get('subscriptions/{subscription}/delete', 'AdminSubscriptionController@getDelete');
    Route::post('subscriptions/{subscription}/delete', 'AdminSubscriptionController@postDelete');
    Route::post('subscriptions/{subscription}/renew', 'AdminSubscriptionController@postSubscriptionModelRenewal');
    Route::controller('subscriptions', 'AdminSubscriptionController');

    ///////////////
    // PROJECTS  //
    ///////////////
    Route::get('projects/data', 'AdminProjectController@getData');
    Route::get('projects/all', 'AdminProjectController@getProjects');
    Route::get('projects/{project}/show', 'AdminProjectController@getShow');
    Route::get('projects/{project}/edit', 'AdminProjectController@getEdit');
    Route::post('projects/{project}/edit', 'AdminProjectController@postEdit');
    Route::get('projects/{project}/delete', 'AdminProjectController@getDelete');
    Route::post('projects/{project}/delete', 'AdminProjectController@postDelete');
    Route::controller('projects', 'AdminProjectController');

    ///////////////
    // SERVICES  //
    ///////////////
    Route::get('settings/services/data', 'AdminServiceController@getData');
    Route::get('settings/services/all', 'AdminServiceController@getServices');
    Route::get('settings/services/{service}/show', 'AdminServiceController@getShow');
    Route::get('settings/services/{service}/edit', 'AdminServiceController@getEdit');
    Route::post('settings/services/{service}/edit', 'AdminServiceController@postEdit');
    Route::get('settings/services/{service}/delete', 'AdminServiceController@getDelete');
    Route::post('settings/services/{service}/delete', 'AdminServiceController@postDelete');
    Route::controller('settings/services', 'AdminServiceController');

    ///////////////
    // COMPANIES //
    ///////////////
    Route::get('companies/data', 'AdminCompanyController@getData');
    // accounting subs
    Route::get('companies/{company}/accounting/subscriptions/data/{type}', function($company, $type) {

        error_log(json_encode($company));
        $a = new AdminAccountingController();
        return $a->getSubscriptionData($type, $company);
    });
    Route::post('companies/{company}/accounting/subscriptions/data', 'AdminAccountingController@postSubscriptionData');
    // accounting worklogs
    Route::get('companies/{company}/accounting/worklogs/data/{type}', function($company, $type) {

        error_log(json_encode($company));
        $b = new AdminAccountingController();
        return $b->getWorklogData($type, $company);
    });
    Route::post('companies/{company}/accounting/worklogs/data', 'AdminAccountingController@postWorklogData');
    // subs nieuwsbrieven
    Route::get('companies/{company}/subscriptions/nieuwsbrieven/data', 'AdminSubscriptionController@getNieuwsbrievenSubscriptionData');
    // subs renewals
    Route::get('companies/{company}/subscriptions/renewals/data', 'AdminSubscriptionController@getRenewalSubscriptionData');
    Route::post('companies/{company}/subscriptions/renewals/data', 'AdminSubscriptionController@postRenewalSubscriptionData');
    // subscriptions all
    Route::get('companies/{company}/subscriptions/data', 'AdminSubscriptionController@getData');
    Route::post('companies/{company}/subscriptions/data', 'AdminSubscriptionController@postModelData');
    // strippen
    Route::get('companies/{company}/strippenkaarten/data', 'AdminStrippenkaartController@getData');
    Route::post('companies/{company}/strippenkaarten/data', 'AdminStrippenkaartController@postModelData');
    // worklogs
    Route::get('companies/{company}/werklogs/data', 'AdminWerklogController@getData');
    Route::post('companies/{company}/werklogs/data', 'AdminWerklogController@postModelData');
    // projects
    Route::get('companies/{company}/projects/data', 'AdminProjectController@getData');
    Route::post('companies/{company}/projects/data', 'AdminProjectController@postModelData');
    // hosting
    Route::get('companies/{company}/hosting/data', 'AdminHostingController@getModelData');
    Route::post('companies/{company}/hosting/data', 'AdminHostingController@postModelData');

    Route::get('companies/{company}/show', 'AdminCompanyController@getShow');
    Route::get('companies/{company}/edit', 'AdminCompanyController@getEdit');
    Route::post('companies/{company}/edit', 'AdminCompanyController@postEdit');
    Route::get('companies/{company}/delete', 'AdminCompanyController@getDelete');
    Route::post('companies/{company}/delete', 'AdminCompanyController@postDelete');
    Route::controller('companies', 'AdminCompanyController');

    ///////////////
    // WORKLOGS  //
    ///////////////
    Route::post('werklogs/roadmap/fetch', 'AdminWerklogController@roadmapFetch');

    Route::get('werklogs/data', 'AdminWerklogController@getData');
    Route::get('werklogs/all', 'AdminWerklogController@getWorklogs');
    Route::get('werklogs/{werklog}/show', 'AdminWerklogController@getShow');
    Route::get('werklogs/{werklog}/show', 'AdminWerklogController@getShow');
    Route::get('werklogs/{werklog}/edit', 'AdminWerklogController@getEdit');
    Route::post('werklogs/{werklog}/edit', 'AdminWerklogController@postEdit');
    Route::get('werklogs/{werklog}/delete', 'AdminWerklogController@getDelete');
    Route::post('werklogs/{werklog}/delete', 'AdminWerklogController@postDelete');
    Route::controller('werklogs', 'AdminWerklogController');

    # Comment Management
    Route::get('comments/{comment}/edit', 'AdminCommentsController@getEdit');
    Route::post('comments/{comment}/edit', 'AdminCommentsController@postEdit');
    Route::get('comments/{comment}/delete', 'AdminCommentsController@getDelete');
    Route::post('comments/{comment}/delete', 'AdminCommentsController@postDelete');
    Route::controller('comments', 'AdminCommentsController');

    # Blog Management
    Route::get('blogs/{post}/show', 'AdminBlogsController@getShow');
    Route::get('blogs/{post}/edit', 'AdminBlogsController@getEdit');
    Route::post('blogs/{post}/edit', 'AdminBlogsController@postEdit');
    Route::get('blogs/{post}/delete', 'AdminBlogsController@getDelete');
    Route::post('blogs/{post}/delete', 'AdminBlogsController@postDelete');
    Route::controller('blogs', 'AdminBlogsController');

    # User Management
    Route::get('users/{user}/show', 'AdminUsersController@getShow');
    Route::get('users/{user}/edit', 'AdminUsersController@getEdit');
    Route::post('users/{user}/edit', 'AdminUsersController@postEdit');
    Route::get('users/{user}/delete', 'AdminUsersController@getDelete');
    Route::post('users/{user}/delete', 'AdminUsersController@postDelete');
    Route::controller('users', 'AdminUsersController');

    # User Role Management
    Route::get('roles/{role}/show', 'AdminRolesController@getShow');
    Route::get('roles/{role}/edit', 'AdminRolesController@getEdit');
    Route::post('roles/{role}/edit', 'AdminRolesController@postEdit');
    Route::get('roles/{role}/delete', 'AdminRolesController@getDelete');
    Route::post('roles/{role}/delete', 'AdminRolesController@postDelete');
    Route::controller('roles', 'AdminRolesController');

    # Admin Dashboard
    //Route::controller('dashboard', 'AdminDashboardController');
    Route::controller('/', 'AdminDashboardController');
});



/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */

// User reset routes
Route::get('user/reset/{token}', 'UserController@getReset');
// User password reset
Route::post('user/reset/{token}', 'UserController@postReset');
//:: User Account Routes ::
Route::post('user/{user}/edit', 'UserController@postEdit');

//:: User Account Routes ::
Route::post('user/login', 'UserController@postLogin');

# User RESTful Routes (Login, Logout, Register, etc)
Route::controller('user', 'UserController');

//:: Application Routes ::

# Filter for detect language
Route::when('contact-us','detectLang');

# Contact Us Static Page
Route::get('contact-us', function()
{
    // Return about us page
    return View::make('site/contact-us');
});

# Posts - Second to last set, match slug
Route::get('{postSlug}', 'BlogController@getView');
Route::post('{postSlug}', 'BlogController@postView');


# Index Page - Last route, no matches
//Route::get('/', array('before' => 'detectLang','uses' => 'BlogController@getIndex'));
Route::get('/', function() {

    $user = null;
    $is_admin = false;

    if(!Auth::guest())
    {
        $user = Auth::user();
    }
    if($user !== null)
    {
        $is_admin = $user->hasRole('admin');
    }

    if($is_admin)
    {
        return Redirect::to('admin');
    }

    return Redirect::to('user/login');

});
