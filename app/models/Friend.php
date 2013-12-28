<?php

class Friend extends Eloquent {

	public $table = "friends";

	public static $rules = array(
		'user_id'   => 'registerrules|User',
		'friend_id' => 'registerrules|User'
	);

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function user_friend()
	{
		return $this->belongsTo('User', 'friend_id');
	}
}
