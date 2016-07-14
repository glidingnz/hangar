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


/**
 * Website --------------------------------------
 */

Route::get('/', 'HomeController@index');


Route::auth();

Route::post('/register', 'UsersController@create');
Route::get('/activate', 'UsersController@activate');
Route::post('/activate', 'UsersController@activate_post');

// pages that must be logged in
Route::group(['middleware' => ['auth']], function () {
	Route::get('/account', 'UsersController@view_account');
	Route::post('/update-account', 'UsersController@update_account');
	Route::get('/aircraft/import-nz', 'AircraftController@import_nz');
	Route::post('/aircraft/import-nz', 'AircraftController@import_nz_action');
});

Route::get('/clubs', 'HomeController@switchOrg');

/* nationwide apps */
Route::get('/aircraft', 'AircraftController@index');
Route::get('/aircraft/{rego}', 'AircraftController@view');


/* load club pages */
Route::group(['middleware' => 'load-org'], function()
{
	Route::get('/apps', 'HomeController@apps');
});


/* club required apps */
Route::group(['middleware' => 'require-org'], function()
{
	Route::get('/fleet', 'AircraftController@fleet');
});

/**
 * Public API, with OAUTH --------------------------------------
 */
Route::group(['prefix'=>'api/v1', 'namespace' => 'Api\V1'], function()
{
	// OAuth required
	Route::group(['middleware' => 'oauth'], function () {
		Route::get('/time', 'OrgController@test');

		Route::resource('aircraft', 'AircraftController', ['only' => [
			'create', 'store', 'edit', 'update', 'destroy'
		]]);
	});
 
	// Public
	Route::get('/orgs',  'OrgController@index');
	Route::get('/orgs/{id}',  'OrgController@show');

	//Route::get('orgs/{org}/fleet', 'FleetController@index');

	Route::resource('aircraft', 'AircraftController', ['only' => [
		'index', 'show'
	]]);

	Route::resource('orgs/{org}/fleet', 'FleetController', ['only' => [
		'index', 'show'
	]]);

});


/**
 * Private cookie based API. Intended for the internal app only.  ------------
 */
Route::group(['prefix'=>'api/private'], function()
{
	Route::get('/orgs',  'Api\V1\OrgController@index');
	Route::get('/orgs/{id}',  'Api\V1\OrgController@show');
	Route::get('/aircraft/import-nz',  'AircraftController@load_nz');

	// Cookies required
	// Route::group(['middleware' => ['auth','load-org']], function () {
	// 	Route::get('/time', 'v1\OrgController@test');
	// });
});


// Route::get('/time', function() {
// 	return ['now' => microtime(), 'date' => date('Y-M-D',time())];
// });
// Route::get('api2', ['middleware' => 'oauth', function() {
// 	// return the protected resource
// 	//echo “success authentication”;
// 	return ['now' => microtime(), 'date' => date('Y-M-D',time())];
// }]);



//Get access_token
Route::post('oauth/access_token', function() {
	return Response::json(Authorizer::issueAccessToken());
});
