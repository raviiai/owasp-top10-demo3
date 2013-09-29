<?php

class AccountSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$users = DB::table('users')->get();
		foreach ($users as $user) {
			$checking = DB::table('accounts')->insertGetId([
				'name'		=> 'Checking Account',
				'user_id'	=> $user->id
			]);

			$savings = DB::table('accounts')->insertGetId([
				'name'		=> 'Savings Account',
				'user_id'	=> $user->id
			]);

			DB::table('transactions')->insert([
				'sender_account_id' => null,
				'receiver_account_id' => $checking,
				'amount' => 2500.0,
				'text' => 'Salary',
				'created_at' => time() - 60*60*24*7
			]);

			DB::table('transactions')->insert([
				'sender_account_id' =>  $checking,
				'receiver_account_id' => $savings,
				'amount' => 300.0,
				'text' => 'Car',
				'created_at' => time() - 60*60*24*6
			]);
		}
	}

}