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
            'client_id'     => '',
            'client_secret' => '',
            'scope'         => array(),
        ),		
        'Google' => array(
    		'client_id'     => '5940012571.apps.googleusercontent.com',
    		'client_secret' => 'sssENe7knfwnJSoTvpyHm56r',
    		'scope'         => array('userinfo_email', 'userinfo_profile'),
		),  
	)

);