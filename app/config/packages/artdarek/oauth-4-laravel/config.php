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
    		'client_id'     => '5940012571-8uja2huacgp32aqm4iknkiq7te7eo2jg.apps.googleusercontent.com',
    		'client_secret' => 'notasecret',
    		'scope'         => array('userinfo_email', 'userinfo_profile'),
		),  
	)

);