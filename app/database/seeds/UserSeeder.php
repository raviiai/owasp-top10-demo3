<?php

class UserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$users = [
			['username'	=> 'mal.reynolds',
			 'name'		=> 'Malcolm Reynolds',
			 'password'	=> sha1('serenity')
			],
			['username'	=> 'river.tam',
			 'name'		=> 'River Tam',
			 'password'	=> sha1('miranda')
			]
		];

		DB::table('users')->insert($users);
	}

}