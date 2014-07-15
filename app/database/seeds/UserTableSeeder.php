<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

		User::create(array(
			'username' => 'Test',
			'password' => Hash::make('test_password'),
			'email' => 'Test@gmail.com'
		));

		User::create(array(
			'username' => 'firt_user',
			'password' => Hash::make('first_password'),
			'email' => 'first_user@gmail.com'
		));

		User::create(array(
			'username' => 'second_user',
			'password' => Hash::make('second_password'),
			'email' => 'second_user@gmail.com'
		));
	}

}
