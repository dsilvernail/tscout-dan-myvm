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

This is the route that simply brings you to the laravel "you have arrived page"
Route::get('/', function()
{
	return View::make('hello');
});
 */


/*---- Route before authentication ----*/
Route::group(["before" => "guest"], function() {
	
	Route::get('login', 'HomeController@getLogin');

	Route::post('login', 'HomeController@postLogin');

	Route::get('register', 'HomeController@getRegister');

	Route::post('register', 'HomeController@postRegister');

	Route::any("/request", [
        "as"   => "user/request",
        "uses" => "UserController@requestAction"
    ]);

     Route::any("/reset", [
        "as"   => "user/reset",
        "uses" => "UserController@resetAction"
    ]);
});

/*---This is a group route filter that allow only authenticated users access
	to given route(s)--- Will add user accound settings/profile customization routes */
Route::group(array('before' => 'auth'), function(){

        Route::any("/profile", [
        "as"   => "user/profile",
        "uses" => "UserController@profileAction"
    ]);
		
		Route::get('logout', 'HomeController@logout');        
});




/*---- Routes for all pages that are not relevant to authentication----*/
Route::get('/', 'HomeController@getIndex');

Route::get('aboutus', 'HomeController@about');

Route::get('divein', 'WebserviceController@divein');

Route::get('demosignin', 'WebserviceController@demosignin');

Route::get('google', 'WebserviceController@loginWithGoogle');

Route::get('facebook', 'WebserviceController@loginWithFacebook');