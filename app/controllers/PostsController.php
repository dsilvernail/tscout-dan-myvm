<?php

class PostsController extends BaseController {

	public function post_comment()
	{

		
	  	$profile = Profile::find($_POST['profileID']);

	  	//$ajax = ($_SERVER[ 'HTTP_X_REQUESTED_WITH' ] === 'XMLHttpRequest');

	  	$db = new Persistence();
	  	$added = $db->add_comment($_POST);

	  	var_dump($added);

	  	if($added) {
	    	$channel_name = 'comments-' . $added['comment_post_ID'];
	    	$event_name = 'new_comment';
	    	$socket_id = (isset($_POST['socket_id'])?$_POST['socket_id']:null);
	    
	   	
	  	Pusherer::trigger($channel_name, $event_name, $added, $socket_id);

	  	exit;
	  	//return View::make('profiles.show', compact($profile));
	  }
	}
}

/*		if($ajax) {
	  		sendAjaxResponse($added);
	  		//'2b10f3c8182f83e0c494';

		}
		else {
	  	sendStandardResponse($added); 
		}
		
	}

	  
	function sendAjaxResponse($added) {
	  		header("Content-Type: application/json");
	  		if($added) {
	    		header( 'Status: 201' );
	    		echo( json_encode($added) );
	  		}
	  		else {
	    	header( 'Status: 400' );
	  		}
		}

	function sendStandardResponse($added) {
	  		if($added) {
	    		header( 'Location: index.php' );
	  		}
	  		else {
	    		header( 'Location: index.php?error=Your comment was not posted due to errors in your form submission' );
	  		}
		}*/
	