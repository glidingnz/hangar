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
 * OAuth
 */

Route::group(['prefix'=>'api/v1', 'namespace' => 'Api\V1'], function()
{
	Route::get('/now', ['middleware' => 'oauth', function() {
		return ['now' => microtime(), 'date' => date('Y-M-D',time())];
	}]);

	Route::get('/orgs',  'OrgController@index');


});


Route::get('api2', ['middleware' => 'oauth', function() {
	// return the protected resource
	//echo “success authentication”;
	return ['now' => microtime(), 'date' => date('Y-M-D',time())];
}]);



//Get access_token
Route::post('oauth/access_token', function() {
	return Response::json(Authorizer::issueAccessToken());
});
