<?php

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */

function parseUrl($url = false)
{
    if (!$url) {
        $url = $_SERVER['REQUEST_URI'];
    }

    $params = explode( '/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) );
    array_shift($params);

    return $params;
}

// A custom condition function.
function is_survey()
{
    // Some logic that returns true or false.
    return parseUrl()[0] == 'survey';
}

function is_reporting()
{
    return parseUrl()[0] == 'reporting';
}

function is_test()
{
    return parseUrl()[0] == 'test';
}

function is_surveytest()
{
    return parseUrl()[0] == 'surveytest';
}

function is_reportingtest()
{
    return parseUrl()[0] == 'reportingtest';
}


//Then add the conditional function to the Route class.
add_filter('themosisRouteConditions', function($conds)
{
    $conds['survey']        = 'is_survey';
    $conds['reporting']     = 'is_reporting';
    $conds['test']          = 'is_test';
    $conds['surveytest']    = 'is_surveytest';
    $conds['reportingtest'] = 'is_reportingtest';

    return $conds; // Always return an associative array.
});

Route::get('home', ['uses' => 'PageController@index']);

Route::get('survey', ['survey', function()
{
    Redirect::to('LimesurveyController', 'getQuestionaire');

}]);

Route::get('reporting', ['reporting', function() {

    Redirect::to('ReportingController', 'getIndex');

    /*
    if (is_user_logged_in()) {

        $d       = Route::getControllerDispatcher();
        $ioc     = $d->getContainer();
        $router  = $ioc['router'];
        $route   = $router->current();
        $request = $router->getCurrentRequest();
        $view    = $d->dispatch($route, $request, 'ReportingController', 'getIndex');

        print_r($view->render());

    } else {

        $d       = Route::getControllerDispatcher();
        $ioc     = $d->getContainer();
        $router  = $ioc['router'];
        $route   = $router->current();
        $request = $router->getCurrentRequest();
        $view    = $d->dispatch($route, $request, 'ReportingController', 'getLogin');

        print_r($view->render());
    }
    */

}]);

Route::get('surveytest', ['surveytest', function() {

    wp_logout();
    $token = 'XA7C3eDddp3yeACP';
    wp_redirect(get_bloginfo('url') . '/survey/'.$token);

}]);

Route::get('reportingtest', ['reportingtest', function() {

    wp_logout();
    //$token = 'XA7C3eDddp3yeACP';
    $token = 'QOu4AbcfyUsoWd93';
    wp_redirect(get_bloginfo('url') . '/reporting/'.$token);

}]);

Route::get('test', ['test', function() {

    Redirect::to('ReportingController', 'getJSON');

}]);

class Redirect {

    public static function to($controller, $action)
    {
        $d       = Route::getControllerDispatcher();
        $ioc     = $d->getContainer();
        $router  = $ioc['router'];
        $route   = $router->current();
        $request = $router->getCurrentRequest();

        $response = $d->dispatch($route, $request, $controller, $action);
        if ($response) {
            echo $response->render();
        }
    }
}
