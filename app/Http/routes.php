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
//test routes
$app->get('foo', function () {
    return 'Hello World';
});

$app->get('/', 'Controller@index');

$app->get('api/getHelpMonitors', 'ApiController@getHelpMonitors');
