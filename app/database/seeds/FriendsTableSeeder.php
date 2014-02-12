<?php

class FriendsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('friends')->truncate();

		$friends = [
			[
				"user_id"    => "1",
				"friend_id"  => "2"

			]

		];

		// Uncomment the below to run the seeder
		// DB::table('friends')->insert($friends);

		foreach ($friends as $friend)
		{
			Friend::create($friend);
		}
	}

}
