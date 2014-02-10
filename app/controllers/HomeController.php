<?php

use Illuminate\Support\MessageBag;

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
	public function getLogin()
	{
		return View::make('home.login');
	}

	public function postLogin()
        {

            $errors = new MessageBag();

            $input = Input::all();

            $v = Validator::make($input, User::$loginrules);

            if ($old = Input::old("errors")) 
            {
                $errors = $old;
            }

            $data = ["errors" => $errors];

            if($v->fails())
                {

                    //We are redirecting our user to the /login page and returning the validation messages 
                    return Redirect::to('login')->withErrors($v);

                } else {
                    //Creating the variable credentials to makes sure that the email entered matches the email entered when 
                    //user registered for TutorScout ($input)
                    $credentials = array('email' => $input['email'], 'password' => $input['password']);

                    if(Auth::attempt($credentials))
                        {

                            return Redirect::to('/profile');

                        } else {
                            //If the login attempt has incorrect values that don't match credentials we wil redirect our 


                            $data["email"] = Input::get("email");

                            return Redirect::to('login')->withInput()->withErrors(array("Email and/or password invalid"));

                        }

                }

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
                   
                    $v = Validator::make($input, User::$registerrules);

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

                            $profile = new Profile();
                            $profile->username = $input['username'];
                            $profile->save();


                            Mail::send('emails.welcome', $input, function($message)
                            {
                                $message->to(Input::get('email'), 'username')->subject('Welcome!');
                            });
                            /*This will redirect our users to the login - IF it passes*/
                            return Redirect::to('login');



                    } else {
                            /*Otherwise it will redirect the user back to the Register page - IF it doesn't pass`
                            When it redirects back to the register page it will keep input from previous trial as well as return the errors from our Validator '$v'*/
                            return Redirect::to('register')->withInput()->withErrors($v);
                    }
            }
    public function logout()
        {
                Auth::logout();
                return Redirect::to('login')->with('message', 'You are now logged out!');
        }

}