<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
	   User::create( array(
	            'username' => 'administrator',
	            'password' => Hash::make('avengerrocks'),
	            'role' => 1,
	    ));
	}

}