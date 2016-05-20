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


Route::get('/', function () {
	return view('welcome');
});

Route::get('orgs', 'OrgsController@index');
//Route::get('api/v1/orgs', 'OrgsController@index');

Route::auth();

//Route::get('register', 'UsersController@register');
Route::post('/register', 'UsersController@create');
Route::get('/activate', 'UsersController@activate');
Route::post('/activate', 'UsersController@activate_post');

Route::get('/home', 'HomeController@index');

/*
Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function () {
	Route::get('/gnz-members', 'GnzMembersApiController@index');
});
*/

/*
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
	$api->get('orgs', 'App\Api\V1\Controllers\OrgsController@index');
});
*/


/**
 * OAuth
 */
Route::get('api2', ['middleware' => 'oauth', function() {
	// return the protected resource
	//echo “success authentication”;
	return ['now' => microtime(), 'date' => date('Y-M-D',time())];
}]);



//Get access_token
Route::post('oauth/access_token', function() {
	return Response::json(Authorizer::issueAccessToken());
});

/*
$api->version('v1', ['middleware' => 'api.auth'] , function ($api) {
    $api->get('time', function () {
        return ['now' => microtime(), 'date' => date('Y-M-D',time())];
    });
});
*/