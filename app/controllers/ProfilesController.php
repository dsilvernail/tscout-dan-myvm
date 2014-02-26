<?php

class ProfilesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $profiles = Profile::all();
        return View::make('profiles.index', compact('profiles'));


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('profiles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$profile = Profile::find($id);


        return View::make('profiles.show', compact('profile'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('profiles.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{	
		/*$friend = [ "friend_id" => Profile::find($id) ];

		$user = [ "user_id" => Auth::user()->$id ];
 
		$friend            = new Friend();
		$friend->user_id   => $user["user_id"];
		$friend->friend_id => $friend["friend_id"];
		$friend->save();

       	$message = 'You are now following' . $friend_id;

        return View::make('profiles.show')->with('message', $message); */

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
