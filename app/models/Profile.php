<?php

class Profile extends Eloquent {

	public $table = 'profiles';

	public function userprofile()
	{
		return $this->belongsTo('User');
	}

	protected $guarded = array();

	public static $rules = array();
}
