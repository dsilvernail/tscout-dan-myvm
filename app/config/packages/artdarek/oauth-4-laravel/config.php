<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => '171791819687548',
            'client_secret' => '883319abf3bb7a6dc1e28e60e604a99f',
            'scope'         => array('email', 'read_friendlists', 'user_online_presence'),
        ),		
        'Google' => array(
    		'client_id'     => '5940012571.apps.googleusercontent.com',
    		'client_secret' => 'sssENe7knfwnJSoTvpyHm56r',
    		'scope'         => array('userinfo_email', 'userinfo_profile'),
		),  
	)

);