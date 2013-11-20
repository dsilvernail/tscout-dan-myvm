<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	
	------ view to show the laravel "you have arrived page" ----
	public function showWelcome()
	{
		return View::make('hello');
	}
	*/
	public function getIndex()
	{
		return View::make('home.index');
	}

	/*---- Returns the view to the basic login page ----*/
	public function getlogin()
	{
		return View::make('home.login');
	}

	public function about()
	{
		return View::make('home.about');
	}

}