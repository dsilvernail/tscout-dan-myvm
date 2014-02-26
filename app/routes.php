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
/*---- Routes for all pages that are not relevant to authentication----*/
Route::get('/', 'HomeController@getIndex');

Route::get('aboutus', 'HomeController@about');

Route::get('divein', 'WebserviceController@divein');

Route::get('demosignin', 'WebserviceController@demosignin');


/*---- Route before authentication ----*/
Route::group(["before" => "guest"], function() {
	
	Route::get('login', 'HomeController@getLogin');

	Route::get('register', 'HomeController@getRegister');

    Route::get('google', 'WebserviceController@loginWithGoogle');

    Route::get('facebook', 'WebserviceController@loginWithFacebook');

	Route::any("/request", [
        "as"   => "user/request",
        "uses" => "UserController@requestAction"
    ]);

     Route::any("/reset", [
        "as"   => "user/reset",
        "uses" => "UserController@resetAction"
    ]);
});

Route::group(array('before' => 'csrf'), function() {

    Route::post('login', 'HomeController@postLogin');

    Route::post('register', 'HomeController@postRegister');

    Route::any('/#openlogin', [
        "as" => "home/loginmodal",
        "uses" => "HomeController@postLogin"
    ]);


});


/*---This is a group route filter that allow only authenticated users access
	to given route(s)--- Will add user accound settings/profile customization routes */
Route::group(array('before' => 'auth'), function(){

        Route::any("/profile", [
            "as"   => "user/profile",
            "uses" => "UserController@profileAction"
        ]);

		Route::any('findusers', [
            'as' => 'user/find', 
            'uses' => 'UserController@findUsers'
        ]);

		Route::get('logout', 'HomeController@logout'); 

        Route::any('/setup', [
            'as' => 'user/setup',
            'uses' => 'UserController@profileSetup',
        ]);

        Route::resource('profiles', 'ProfilesController');

});


Route::group(array('before' => array('auth', 'csrf')), function() {

        Route::post('findusers', array('uses' => 'UserController@findUsers'));
});







Route::resource('activities', 'ActivitiesController');