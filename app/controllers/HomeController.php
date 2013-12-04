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

	public function getRegister()
	{
		return View::make('home.register');
	}
	 public function postRegister()
            {
                    /*Here we are going to grab all the input and put it into a variable called $input*/
                    $input = Input::all();
                    /*Here we are making the username, email and passwords required as well as make the email and username unique!*/
                    $rules = array('username' => 'required|unique:users', 'email' => 'required|unique:users|email', 'password' => 'required');

                    $v = Validator::make($input, $rules);

                    if($v->passes())
                    {
                            $password = $input['password'];
                            /*This will hash our passwords when we make them*/
                            $password = Hash::make($password);

                            /*Creates a new user object*/
                            $user = new User();
                            $user->username = $input['username'];
                            $user->email = $input['email'];
                            $user->password = $password;
                            $user->save();

                            /*This will redirect our users to the login - IF it passes*/
                            return Redirect::to('login');

                    } else {
                            /*Otherwise it will redirect the user back to the Register page - IF it doesn't pass`
                            When it redirects back to the register page it will keep input from previous trial as well as return the errors from our Validator '$v'*/
                            return Redirect::to('register')->withInput()->withErrors($v);
                    }
            }
}