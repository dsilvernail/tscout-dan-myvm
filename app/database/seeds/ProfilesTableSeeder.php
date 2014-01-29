<?php

class ProfilesTableSeeder extends DatabaseSeeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('profiles')->truncate();

		$profiles = [
			[
				"username" => "Silver",
				"f_name"   => "Dan",
				"l_name"   => "Silvernail",
				"age"      => "21",
				"zip"      => "20176",
				"about"    => "Tutorscout is Great!",
				"imgpath"  => "/pics/dan2.jpg"

			],

			[
				"username" => "DirtyDave",
				"f_name"   => "Dave",
				"l_name"   => "DiPascal",
				"age"      => "21",
				"zip"      => "22801",
				"about"    => "Tutorscout is Great!",
				"imgpath"  => "/pics/dan2.jpg"

			]
		];

		foreach ($profiles as $profile)
		{
			Profile::create($profile);
		}

		// Uncomment the below to run the seeder
		// DB::table('profiles')->insert($profiles);
	}

}
