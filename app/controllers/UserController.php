<?php

use Illuminate\Support\MessageBag;

class UserController extends BaseController {

	public function requestAction()
    {
        $data = [
            "requested" => Input::old("requested")
        ];

        if (Input::server("REQUEST_METHOD") == "POST")
        {
            $validator = Validator::make(Input::all(), [
                "email" => "required"
            ]);

            if ($validator->passes())
            {
                $credentials = [
                    "email" => Input::get("email")
                ];

                Password::remind($credentials,
                    function($message, $user)
                    {
                        $message->from("chris@example.com");
                    }
                );

                $data["requested"] = true;

                return Redirect::route("user/request")
                    ->withInput($data);
            }
        }

        return View::make("user/request", $data);
    }

    public function resetAction()
    {
        $token = "?token=" . Input::get("token");

        $errors = new MessageBag();

        if ($old = Input::old("errors"))
        {
            $errors = $old;
        }

        $data = [
            "token"  => $token,
            "errors" => $errors
        ];

        if (Input::server("REQUEST_METHOD") == "POST")
        {
            $validator = Validator::make(Input::all(), [
                "email"                 => "required|email",
                "password"              => "required|min:6",
                "password_confirmation" => "required|same:password",
                "token"                 => "required|exists:token,token"
            ]);

            if ($validator->passes())
            {
                $credentials = [
                    "email" => Input::get("email")
                ];

                Password::reset($credentials,
                    function($user, $password)
                    {
                        $user->password = Hash::make($password);
                        $user->save();

                        Auth::login($user);        

                        return Redirect::route("user/profile");
                    }
                );
            }

            $data["email"]  = Input::get("email");
            $data["errors"] = $validator->errors();

            return Redirect::to(URL::route("user/reset") . $token)
                ->withInput($data);
        }

        return View::make("user/reset", $data);
    }

    public function profileAction()
    {
        $user_id = Auth::user()->id;

        $profile = Profile::find($user_id);
        return View::make("user/profile", compact('profile'));
    }

     public function findUsers()
        {
                $username = Input::get('username');

                if (isset($username) && !empty($username)) {
                        $users =  User::where('username', 'like', "%{$username}%")
                                                        ->where('id', "!=", Auth::user()->id)
                                                        ->get();
                        $friends = Auth::user()->friends()->get();
                        $friends_id = array();
                        foreach ($friends as $f) {
                                $friends_id[] = $f->friend_id;
                        }
                        
                } else {
                        $users = null;
                        $friends_id = array();
                }

                return View::make('user.find')
                        ->with('users', $users)
                        ->with('friends_id', $friends_id);
        }
}