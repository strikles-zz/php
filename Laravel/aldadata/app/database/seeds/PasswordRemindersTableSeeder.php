<?php

class PasswordRemindersTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('password_reminders')->delete();
        
		\DB::table('password_reminders')->insert(array (
			0 => 
			array (
				'email' => 'peter@eenvoudmedia.nl',
				'token' => 'f68e65b2d418e589ff35afeace4f90a9',
				'created_at' => '2015-04-21 12:05:46',
			),
			1 => 
			array (
				'email' => 'andre@eenvoudmedia.nl',
				'token' => '20481468d4b84c7b3571988fd60d73eb',
				'created_at' => '2015-04-24 08:07:57',
			),
			2 => 
			array (
				'email' => 'claudio.andre.neto@gmail.com',
				'token' => 'f70dfe036a832993b218d5190b9ec6d6',
				'created_at' => '2015-04-24 08:53:48',
			),
			3 => 
			array (
				'email' => 'claudio.andre.neto@gmail.com',
				'token' => 'a094060c0b718e1aac338c7ebdcf8a23',
				'created_at' => '2015-04-24 08:56:33',
			),
			4 => 
			array (
				'email' => 'claudio.andre.neto@gmal.com',
				'token' => 'a5091480c8da0822cdd5c834ada9dfb7',
				'created_at' => '2015-04-24 08:58:23',
			),
		));
	}

}
