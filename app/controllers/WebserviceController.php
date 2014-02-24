<?php

class WebserviceController extends BaseController {

	public function divein()
	{
		return View::make('education.divein');
	}

	public function demosignin()
	{
		return View::make('education.demosignin');
	}

	public function loginWithGoogle() {

    	// get data from input
    	$code = Input::get( 'code' );

    	// get google service
    	$googleService = OAuth::consumer( 'Google' );

    	// check if code is valid

    	// if code is provided get user data and sign in
    	if ( !empty( $code ) ) {

        	// This was a callback request from google, get the token
        	$token = $googleService->requestAccessToken( $code );

        	// Send a request with it
        	$result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

            $email = [ "email" => $result["email"] ];

            $email = User::where("email", "=", $user["email"])->first();

            $user = [ "google_id" => $result["id"] ];

            $user = User::where("google_id", "=", $user["google_id"])->first();



            if ( $user ) {

                Auth::login( $user );

                $message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];

                return Redirect::to( '/profile')->with( 'message', $message);

            }

            else {
                //first time google login

                //create new user and save in db
                $user = new User();
                $user->username = $result['name'];
                $user->email = $result['email'];
                $user->google_id = $result['id'];
                $user->save();

                $profile = new Profile();
                $profile->username = $result['name'];
                $profile->save();

                Auth::login($user);

                //$message_success = 'Your unique google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
                $message_notice  = 'Account Created.';

                return Redirect::to( '/profile' )->with( 'message', $message_notice );

            }


    	}
    	// if not ask for permission first
    	else {
        	// get googleService authorization
        	$url = $googleService->getAuthorizationUri();

        	// return to facebook login url
        	return Response::make()->header( 'Location', (string)$url );
    	}
	}

    public function loginWithFacebook() {

        // get data from input
        $code = Input::get( 'code' );

        // get fb service
        $fb = OAuth::consumer( 'Facebook' );

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {

            // This was a callback request from google, get the token
            $token = $fb->requestAccessToken( $code );

            // Send a request with it
            $result = json_decode( $fb->request( '/me' ), true );

            $message = 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
            
            $user = ['facebook_id' => $result['id'] ];

            $user = User::where("facebook_id", "=", $user['facebook_id'])->first();

            if ( $user ) {

                Auth::login( $user );

                $message = 'Your unique Facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];

                return Redirect::to( '/profile')->with( 'message', $message);

            }

            else {

                


                //first time facebook login

                //create new user and save in db
                $user = new User();
                $user->username = $result['name'];
                $user->email = $result["email"];
                $user->facebook_id = $result['id'];
                $user->save();

                $profile = new Profile();
                $profile->username = $result['name'];
                $profile->save();

                Auth::login($user);

                //$message_success = 'Your unique google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
                $message_notice  = 'Account Created.';

                return Redirect::to( '/profile' )->with( 'message', $message_notice );

            }

        }
        // if not ask for permission first
        else {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
            return Response::make()->header( 'Location', (string)$url );
        }

    }    

}