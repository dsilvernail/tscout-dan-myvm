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

/*---- Route for the Home Page ----*/
Route::get('/', 'HomeController@getIndex');

/*---- Route for the Web application registration ----*/
Route::get('login', 'HomeController@getlogin');

/*---- Route for the page that shows the team and bios ----*/
Route::get('aboutus', 'HomeController@about');

Route::get('divein', 'WebserviceController@divein');

Route::get('demosignin', 'WebserviceController@demosignin');

Route::get('registration', 'HomeController@register');