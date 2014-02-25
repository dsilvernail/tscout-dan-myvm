<?php
/*  
    Notes to Self
    1. The loginWithGoogle and loginWithFacebook needs be turn into one 
      method where the google or facebook button click determines the consumer
      of the service $service = OAuth::consumer( 'Facebook or Google')
    2. Then the run the rest of the commands based on the service 

*/
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

            //allows $user["google_id"] to be set as the $result["id"] 
            $user = [ "google_id" => $result["id"] ];

            //Query for existence of google_id in the user table - query through model
            $user = User::where("google_id", "=", $user["google_id"])->first();

            //performs same action as line 35 except for the email parameter
            $email = [ "email" => $result["email"] ];

            //query through model
            $email = User::where("email", "=", $email["email"])->first();


            //if user exists
            if ( $user ) {

                Auth::login( $user );

                $message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];

                return Redirect::to( '/profile')->with( 'message', $message);


            //if the user does not exist check if email address matches entry in db
            } elseif ( $email ) {

                //grabs user in db with email
                $user = User::where("email", "=", $email["email"])->first();

                //updates the user info
                $user->google_id = $result['id'];
                $user->save();

                //This muli-line comment would be how to directly retrieve the data from the database and not the model
                /*DB::table('users')
                            ->where('email', $result['email'])
                            ->update(['google_id' => $result["id"] ] ); */


                $user = [ "google_id" => $result["id"] ];

                //makes sure the user has updated information
                $user = User::where("google_id", "=", $user["google_id"])->first();

                Auth::login( $user );

                $message_update = "Your unique Google user id is: " . $result['id'] . " and has been added to your existing account.";

                return Redirect::to('/profile')->with('message', $message_update);
                

            } else {
                //first time google login

                //create new user and save in db
                $user = new User();
                $user->username = $result['name'];
                $user->email = $result['email'];
                $user->google_id = $result['id'];
                $user->save();

                /*creates profile at same time so user and profile have same id values 
                    -must might need to be refactored
                 */
                $profile = new Profile();
                $profile->username = $result['name'];
                $profile->save();

                Auth::login($user);

                $message_notice  = 'Account Created.';

                return Redirect::to( '/profile' )->with( 'message', $message_notice );

            }


    	}
    	// if not ask for permission first
    	else {
        	// get googleService authorization
        	$url = $googleService->getAuthorizationUri();

        	// return to google login url
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
            
            $user = ['facebook_id' => $result['id'] ];

            //query for user existence
            $user = User::where("facebook_id", "=", $user['facebook_id'])->first();

        
            $email = [ "email" => $result["email"] ];

            //query for users email
            $email = User::where("email", "=", $email["email"])->first();

            //if user exists
            if ( $user ) {

                //login user
                Auth::login( $user );

                $message = 'Your unique Facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];

                return Redirect::to( '/profile')->with( 'message', $message);

            //if the user does not exist check if email address matches entry in db
            } elseif ( $email ) {

                //grabs user in db with email
                $user = User::where("email", "=", $email["email"])->first();

                //updates the user info
                $user->facebook_id = $result['id'];
                $user->save();

                $user = [ "facebook_id" => $result["id"] ];

                //makes sure the user has updated information
                $user = User::where("facebook_id", "=", $user["facebook_id"])->first();

                Auth::login( $user );

                $message_update = "Your unique Facebook user id is: " . $result['id'] . " and has been added to your existing account.";

                return Redirect::to('/profile')->with('message', $message_update);
                

            } else {

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