<?php

class FollowController extends BaseController {

	public function postFollow($id_follow)
	{

		$friend            = new Friend();
		$friend->friend_id = $id_follow;
		$friend->user_id   = Auth::user()->id;
		$friend->save();

       	$message = 'You are now following this user';

        return Redirect::route('profiles.show', [$id_follow])->with('message',$message);

	}

	public function destroyFollow($id_follow)
	{
		Friend::where('user_id', '=', Auth::user()->id)
					->where('friend_id', '=', $id_follow)
					->delete();


		$message = "You just unfollowed someone";

		return Redirect::to("/profile")->with('message',$message);
	}

}