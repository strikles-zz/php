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

Route::get('registration/company', function() {
    return Response::JSON(['test' => Session::getToken()])  ;
  });

Route::get('/test', function() {

	$event_date = '2015-10-13';

	$task = (object) ['deadline_days_gap' => -2];

	$new_deadline = strtotime(- $task->deadline_days_gap . ' days', strtotime($event_date));

	echo date('Y-m-d', $new_deadline);

	return;

	$hotel = Hotel::find(4);
	Debugbar::info($hotel);

	$venue = Venue::find(77);
	$hospitality = $venue->hospitality;
	Debugbar::info($hospitality);

	$first_hotel = $hospitality->first_hotel_option()->associate($hotel);
	$first_hotel = $hospitality->first_hotel_option()->get();
	Debugbar::info($first_hotel);

	echo 'test';
});

Route::get('/table-view', function() {
	return View::make('test/table-view');
});


/** ------------------------------------------
 *  Route model binding
 *  ------------------------------------------
 */
Route::model('user', 'User');
Route::model('role', 'Role');

Route::model('company', 'Company');
Route::model('contact', 'Contact');
Route::model('venue', 'Venue');
Route::model('hotel', 'Hotel');
Route::model('hospitality', 'Hospitality');
Route::model('event', 'Events');
Route::model('ticket', 'Ticket');
Route::model('tickettype', 'TicketType');
Route::model('document', 'Document');
Route::model('airport', 'Airport');
Route::model('country', 'Country');
Route::model('city', 'City');
Route::model('picture', 'Picture');
Route::model('taskevent', 'TaskEvent');
Route::model('taskfile', 'TaskFile');
Route::model('tasktemplate', 'TaskTemplate');
Route::model('tickettype', 'TicketType');


/** ------------------------------------------
 *  Route constraint patterns
 *  ------------------------------------------
 */
Route::pattern('user', '[0-9]+');
Route::pattern('role', '[0-9]+');
Route::pattern('token', '[0-9a-z]+');

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
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

    Route::get('tasks', 'AdminTasksController@getIndex');
    Route::post('tasks', 'AdminTasksController@postIndex');
    Route::controller('tasks', 'AdminTasksController');
    Route::resource('api/v1/tasks', 'AdminTasksController');

    Route::get('tasktemplates/{tasktemplate}/show', 'AdminTasktemplateController@getShow');
    Route::get('tasktemplates/{tasktemplate}/edit', 'AdminTasktemplateController@getEdit');
    Route::post('tasktemplates/{tasktemplate}/edit', 'AdminTasktemplateController@postEdit');
    Route::get('tasktemplates/{tasktemplate}/delete', 'AdminTasktemplateController@getDelete');
    Route::post('tasktemplates/{tasktemplate}/delete', 'AdminTasktemplateController@postDelete');
    Route::controller('tasktemplates', 'AdminTasktemplateController');

    # Admin Dashboard
    Route::controller('/', 'AdminDashboardController');
});

/*
    Promoters
 */
Route::group(array('prefix' => 'my-events', 'before' => 'auth'), function()
{

    Route::get('/registration', 'PromoterController@getRegistration');

    Route::get('/{event}', 'PromoterController@getIndex');
    Route::get('/{event}/details/venue', 'PromoterController@getIndex');
    Route::post('/{event}/details/venue', 'PromoterController@postVenue');
    Route::get('/{event}/details/hospitality', 'PromoterController@getIndex');
    Route::post('/{event}/details/hospitality', 'PromoterController@postHospitality');

    Route::get('/{event}/dashboard', 'PromoterController@getIndex');
    Route::get('/{event}/group1', 'PromoterController@getIndex');
    Route::get('/{event}/group2', 'PromoterController@getIndex');
    Route::get('/{event}/group3', 'PromoterController@getIndex');
    Route::get('/{event}/group4', 'PromoterController@getIndex');
    Route::get('/{event}/tickets', 'PromoterController@getIndex');

    Route::get('/events/btns', 'PromoterController@getIndex');
    Route::get('/events/rows', 'PromoterController@getIndex');
    Route::get('/events', 'PromoterController@getIndex');

    Route::get('/', 'PromoterController@getIndex');
});
//Route::get('my-events/{all}', 'PromoterController@getIndex')->where('all', '.*');

Route::group(array('before' => 'auth'), function() {

    Route::get('user/{user}/show', 'UserController@getShow');
    Route::get('user/{user}/edit', 'UserController@getEdit');
    Route::post('user/{user}/edit', 'UserController@postEdit');
    Route::get('user/{user}/delete', 'UserController@getDelete');
    Route::post('user/{user}/delete', 'UserController@postDelete');

	/* ALDA ROUTES */
    Route::get('search', 'SearchController@getIndex');
    Route::post('search_companies_data', 'SearchController@getCompanyResults');
    Route::post('search_venues_data', 'SearchController@getVenueResults');
    Route::post('search_contacts_data', 'SearchController@getContactResults');

    Route::get('pictures/{picture}/delete', 'PicturesController@getDelete');
    Route::post('pictures/{picture}/delete', 'PicturesController@postDelete');
    Route::controller('pictures', 'PicturesController');

    // Company Management
    Route::get('companies/{company}/show', 'CompaniesController@getShow');
    Route::get('companies/{company}/edit', 'CompaniesController@getEdit');
    Route::post('companies/{company}/edit', 'CompaniesController@postEdit');
    Route::get('companies/{company}/delete', 'CompaniesController@getDelete');
    Route::post('companies/{company}/delete', 'CompaniesController@postDelete');
    Route::get('companies/{company}/{relation}/{child}/detach', 'CompaniesController@getDetachChild');
    Route::post('companies/{company}/{relation}/{child}/detach', 'CompaniesController@postDetachChild');
    Route::post('companies/{company}/{relation}/{child}/attach', 'CompaniesController@postAttachChild');
    Route::get('companies/{company}/details', 'CompaniesController@getDetails');
    Route::controller('companies', 'CompaniesController');

    // Contact Management
    Route::get('contacts/{contact}/show', 'ContactsController@getShow');
    Route::get('contacts/{contact}/edit', 'ContactsController@getEdit');
    Route::post('contacts/{contact}/edit', 'ContactsController@postEdit');
    Route::get('contacts/{contact}/delete', 'ContactsController@getDelete');
    Route::post('contacts/{contact}/delete', 'ContactsController@postDelete');
    Route::get('contacts/{contact}/{relation}/{child}/detach', 'ContactsController@getDetachChild');
    Route::post('contacts/{contact}/{relation}/{child}/detach', 'ContactsController@postDetachChild');
    Route::post('contacts/{contact}/{relation}/{child}/attach', 'ContactsController@postAttachChild');
    Route::get('contacts/{contact}/details', 'ContactsController@getDetails');
    Route::controller('contacts', 'ContactsController');

    // Venue Management
    Route::get('venues/{venue}/show', 'VenuesController@getShow');
    Route::get('venues/{venue}/edit', 'VenuesController@getEdit');
    Route::post('venues/{venue}/edit', 'VenuesController@postEdit');
    Route::get('venues/{venue}/delete', 'VenuesController@getDelete');
    Route::post('venues/{venue}/delete', 'VenuesController@postDelete');
    Route::post('venues/{venue}/upload', 'VenuesController@postUpload');
    Route::get('venues/{venue}/pictures/{picture}/unlink', 'VenuesController@getUnlinkPic');
    Route::post('venues/{venue}/pictures/{picture}/unlink', 'VenuesController@postUnlinkPic');
    Route::get('venues/{venue}/{relation}/{child}/detach', 'VenuesController@getDetachChild');
    Route::post('venues/{venue}/{relation}/{child}/detach', 'VenuesController@postDetachChild');
    Route::post('venues/{venue}/{relation}/{child}/attach', 'VenuesController@postAttachChild');
    Route::get('venues/{venue}/details', 'VenuesController@getDetails');
    Route::controller('venues', 'VenuesController');

    // Hotel Management
    Route::get('hotels/{hotel}/show', 'HotelsController@getShow');
    Route::get('hotels/{hotel}/edit', 'HotelsController@getEdit');
    Route::post('hotels/{hotel}/edit', 'HotelsController@postEdit');
    Route::get('hotels/{hotel}/delete', 'HotelsController@getDelete');
    Route::post('hotels/{hotel}/delete', 'HotelsController@postDelete');
    Route::get('hotels/{hotel}/{relation}/{child}/detach', 'HotelsController@getDetachChild');
    Route::post('hotels/{hotel}/{relation}/{child}/detach', 'HotelsController@postDetachChild');
    Route::get('hotels/{hotel}/details', 'HotelsController@getDetails');
    Route::controller('hotels', 'HotelsController');

    // Hospitality Details Management
    Route::get('hospitalities/{hospitality}/show', 'HospitalityController@getShow');
    Route::get('hospitalities/{hospitality}/edit', 'HospitalityController@getEdit');
    Route::post('hospitalities/{hospitality}/edit', 'HospitalityController@postEdit');
    Route::get('hospitalities/{hospitality}/delete', 'HospitalityController@getDelete');
    Route::post('hospitalities/{hospitality}/delete', 'HospitalityController@postDelete');
    Route::get('hospitalities/{hospitality}/{relation}/{child}/detach', 'HospitalityController@getDetachChild');
    Route::post('hospitalities/{hospitality}/{relation}/{child}/detach', 'HospitalityController@postDetachChild');
    Route::post('hospitalities/{hospitality}/{relation}/{hotel}/attach', 'HospitalityController@postAssociateChild');
    Route::get('hospitalities/{hospitality}/details', 'HospitalityController@getDetails');
    Route::controller('hospitalities', 'HospitalityController');

    // Event Management
    Route::get('events/{event}/{relation}/{child}/detach', 'EventsController@getDetachChild');
    Route::post('events/{event}/{relation}/{child}/detach', 'EventsController@postDetachChild');
    Route::post('events/{event}/{relation}/{child}/attach', 'EventsController@postAttachChild');
    // event tickettypes
    Route::get('events/{event}/tickettypes/{tickettype}/edit', 'TicketTypesController@getEdit');
    Route::post('events/{event}/tickettypes/{tickettype}/edit', 'TicketTypesController@postEdit');
    Route::get('events/{event}/tickettypes/create', 'TicketTypesController@getCreate');
    Route::post('events/{event}/tickettypes/create', 'TicketTypesController@postCreate');
    // delete
    Route::get('tickettypes/{tickettype}/delete', 'TicketTypesController@getDelete');
    Route::post('tickettypes/{tickettype}/delete', 'TicketTypesController@postDelete');
    // events
    Route::get('events/{event}/show', 'EventsController@getShow');
    Route::get('events/{event}/edit', 'EventsController@getEdit');
    Route::post('events/{event}/edit', 'EventsController@postEdit');
    Route::get('events/{event}/delete', 'EventsController@getDelete');
    Route::post('events/{event}/delete', 'EventsController@postDelete');
    Route::controller('events', 'EventsController');

    // Document Management
    Route::get('documents/{document}/show', 'DocumentsController@getShow');
    Route::get('documents/{document}/edit', 'DocumentsController@getEdit');
    Route::post('documents/{document}/edit', 'DocumentsController@postEdit');
    Route::get('documents/{document}/delete', 'DocumentsController@getDelete');
    Route::post('documents/{document}/delete', 'DocumentsController@postDelete');
    Route::get('documents/{document}/{relation}/{child}/detach', 'DocumentsController@getDetachChild');
    Route::post('documents/{document}/{relation}/{child}/detach', 'DocumentsController@postDetachChild');
    Route::controller('documents', 'DocumentsController');

    // Hotel Management
    Route::get('airports/{airport}/show', 'AirportsController@getShow');
    Route::get('airports/{airport}/edit', 'AirportsController@getEdit');
    Route::post('airports/{airport}/edit', 'AirportsController@postEdit');
    Route::get('airports/{airport}/delete', 'AirportsController@getDelete');
    Route::post('airports/{airport}/delete', 'AirportsController@postDelete');
    Route::get('airports/{airport}/{relation}/{child}/detach', 'AirportsController@getDetachChild');
    Route::post('airports/{airport}/{relation}/{child}/detach', 'AirportsController@postDetachChild');
    Route::controller('airports', 'AirportsController');

    // Country Management
    Route::get('countries/{country}/show', 'CountriesController@getShow');
    Route::get('countries/{country}/edit', 'CountriesController@getEdit');
    Route::post('countries/{country}/edit', 'CountriesController@postEdit');
    Route::get('countries/{country}/delete', 'CountriesController@getDelete');
    Route::post('countries/{country}/delete', 'CountriesController@postDelete');
    Route::get('countries/{country}/{relation}/{child}/detach', 'CountriesController@getDetachChild');
    Route::post('countries/{country}/{relation}/{child}/detach', 'CountriesController@postDetachChild');
    Route::post('countries/{country}/{relation}/{child}/attach', 'CountriesController@postAttachChild');
    Route::controller('countries', 'CountriesController');

    // JSON for datalist things
    Route::resource('api/v1/countries', 'CountriesController');
    Route::resource('api/v1/countries_json', 'CountryController');
    Route::resource('api/v1/cities', 'CityController');
    Route::resource('api/v1/companies', 'CompaniesController');
    Route::resource('api/v1/contacts', 'ContactsController');
    Route::resource('api/v1/events', 'EventsController');
    Route::resource('api/v1/hotels', 'HotelsController');
    Route::resource('api/v1/hospitalities', 'HospitalityController');
    Route::resource('api/v1/user', 'UserController');
    Route::resource('api/v1/venues', 'VenuesController');
    //my-events
    Route::post('api/v1/my-events/{event}/event-tickets-sold', 'PromoterController@postTicketSales');
    Route::any('api/v1/my-events/{event}/tasks/{taskevent}/s3upload', 'TaskFileController@postFileS3');
    Route::any('api/v1/my-events/{event}/tasks/{taskevent}/upload', 'TaskFileController@postFile');
    Route::post('api/v1/my-events/{event}/tasks/{taskevent}/comment', 'TaskEventController@postComment');
    Route::post('api/v1/my-events/{event}/tasks/{taskevent}/email', 'TaskEventController@postNotification');
    Route::post('api/v1/my-events/{event}/tasks/{taskevent}/status', 'TaskEventController@postStatus');
    Route::post('api/v1/my-events/{event}/tasks/{taskevent}/active', 'TaskEventController@postActive');
    Route::post('api/v1/my-events/{event}/tasks/{taskevent}/due_date', 'TaskEventController@postDueDate');
    Route::get('api/v1/my-events/tasks/{taskevent}', 'TaskEventController@getTaskEvent');

    // upload task files
    Route::get('taskfiles/{taskfile}/url', 'TaskFileController@getFileURL');
    Route::post('taskfiles/{taskfile}/delete', 'TaskFileController@deleteFile');

    Route::get('api/v1/my-events/{event}/tasks', 'PromoterController@getTasks');
    Route::get('api/v1/my-events/{event}/details', 'PromoterController@getDetails');
    Route::get('api/v1/my-events/cats', 'PromoterController@JSONTaskCategories');

    // get all the things
    Route::get('api/v1/my-events/', 'PromoterController@getEvents');

    // Empty Iframe
    Route::get('iframe', 'CRUDController@getIframe');

    Route::get('/', function()
    {
        if(Auth::user()->hasRole('promoter') || Auth::user()->hasRole('User'))
        {
            return Redirect::to('/my-events');
        }
        else
        {
            return Redirect::to('/search');
            // $sc = new SearchController();
            // return $sc->getIndex();
        }
    });
});


// csrf token mismatch error otherwise - fixme
Route::post('registration/company', 'PromoterController@postRegistrationCompany');
Route::post('registration/personal', 'PromoterController@postRegistrationPersonal');
Route::post('registration/address', 'PromoterController@postRegistrationAddress');

Route::get('registration/company', 'PromoterController@getRegistrationCompany');
Route::get('registration/personal', 'PromoterController@getRegistrationPersonal');
Route::get('registration/address', 'PromoterController@getRegistrationAddress');


/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */

Route::get('missingticketsales/{autologinToken}', 'PromoterController@getMissingSales');
Route::post('missingticketsales/{autologinToken}', 'PromoterController@getMissingSales');

Route::get('notifications/{autologinToken}', 'PromoterController@getNotifications');
Route::post('notifications/{autologinToken}', 'PromoterController@getNotifications');

// User reset routes
Route::get('user/reset/{token}', 'UserController@getReset');
// User password reset
Route::post('user/reset/{token}', 'UserController@postReset');
// User Account Routes
Route::post('user/{user}/edit', 'UserController@postEdit');



// User Account Routes
Route::post('user/login', 'UserController@postLogin');
Route::controller('user', 'UserController');


// Filter for detect language
Route::when('contact-us','detectLang');


// Route::get('/', function()
// {
//     // Return about us page
//     return View::make('site/home');
// });
