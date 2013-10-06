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
			['id'		=> 1,
			 'username'	=> 'mal.reynolds',
			 'name'		=> 'Malcolm Reynolds',
			 'password'	=> sha1('serenity')
			],
			['id'		=> 2,
			 'username'	=> 'river.tam',
			 'name'		=> 'River Tam',
			 'password'	=> sha1('miranda')
			],
			['id'		=> 3,
			 'username'	=> 'evil.eve',
			 'name'		=> 'Evil Eve',
			 'password'	=> sha1('evil')
			]
		];

		DB::table('users')->insert($users);
	}

}