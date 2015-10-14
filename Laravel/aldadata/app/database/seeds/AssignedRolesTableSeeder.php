<?php

class AssignedRolesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('assigned_roles')->delete();
        
		\DB::table('assigned_roles')->insert(array (
			0 => 
			array (
				'id' => 1,
				'user_id' => 1,
				'role_id' => 1,
			),
			1 => 
			array (
				'id' => 69,
				'user_id' => 53,
				'role_id' => 4,
			),
			2 => 
			array (
				'id' => 71,
				'user_id' => 54,
				'role_id' => 4,
			),
			3 => 
			array (
				'id' => 74,
				'user_id' => 56,
				'role_id' => 4,
			),
			4 => 
			array (
				'id' => 82,
				'user_id' => 60,
				'role_id' => 4,
			),
			5 => 
			array (
				'id' => 84,
				'user_id' => 62,
				'role_id' => 3,
			),
			6 => 
			array (
				'id' => 85,
				'user_id' => 63,
				'role_id' => 4,
			),
		));
	}

}
