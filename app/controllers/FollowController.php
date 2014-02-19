<?php

class FollowController extends BaseController {

	public function follow($id)
	{
        $user_id = Auth::user()->$id;

        $friend_id = Profile::find($id);

        return Redirect::to('/profile')->with('message', 'You have tried to follow someone!');


	}

}