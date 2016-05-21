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


Route::auth();

Route::post('/register', 'UsersController@create');
Route::get('/activate', 'UsersController@activate');
Route::post('/activate', 'UsersController@activate_post');

Route::get('/home', 'HomeController@index');


/**
 * OAuth Public API
 */
Route::group(['prefix'=>'api/v1', 'namespace' => 'Api\V1'], function()
{
	Route::get('/orgs',  'OrgController@index');
	Route::get('/orgs/{id}',  'OrgController@show');

	// OAuth required
	Route::group(['middleware' => 'oauth'], function () {
		Route::get('/time', 'OrgController@test');
	});

});


/**
 * Private cookie based API. Intended for the internal app only.
 */
Route::group(['prefix'=>'api/private', 'namespace' => 'Api'], function()
{
	Route::get('/orgs',  'V1\OrgController@index');
	Route::get('/orgs/{id}',  'V1\OrgController@show');

	// Cookies required
	Route::group(['middleware' => 'auth'], function () {
		Route::get('/time', 'v1\OrgController@test');
	});
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
