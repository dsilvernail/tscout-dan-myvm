<?php

class FollowController extends BaseController {

	public function postFollow($id_follow)
	{
		$profile = Profile::find($id_follow);

		$friend            = new Friend();
		$friend->friend_id = $id_follow;
		$friend->user_id   = Auth::user()->id;
		$friend->save();

       	$message = 'You are now following this user';

        return View::make('profiles.show', compact('profile'))->with('message', $message);

	}

	public function destroyFollow($id_follow)
	{
		$unfollow = Friend::where('user_id', '=', Auth::user()->id)
							->where('friend_id', '=', $id_follow)
							->first();

		$unfollow = Friend::Find($unfollow);

		Friend::destroy($unfollow);

		$profile = Auth::user()->id;

		return Redirect::to("user/profile")->with('message', "You have unfollowed this person");

	}

}