<?php

class UserSeeder extends DatabaseSeeder {

	public function run()
	{
	
		$users = [
			[
				"username" => "Silver",
				"password" => Hash::make('boston04'),
				"email"    => "daniel.silvernail@gmail.com"	
			],

			[
				"username" => "DirtyDave",
				"password" => Hash::make('daved'),
				"email"    => 'daniel.silvernail@gmail.com'

			]
		];

		foreach ($users as $user)
		{
			User::create($user);
		}
		
	}

}