<?php

class PermissionRoleTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('permission_role')->delete();
        
		\DB::table('permission_role')->insert(array (
			0 => 
			array (
				'id' => 1,
				'permission_id' => 1,
				'role_id' => 1,
			),
			1 => 
			array (
				'id' => 2,
				'permission_id' => 2,
				'role_id' => 1,
			),
			2 => 
			array (
				'id' => 3,
				'permission_id' => 3,
				'role_id' => 1,
			),
			3 => 
			array (
				'id' => 4,
				'permission_id' => 4,
				'role_id' => 1,
			),
			4 => 
			array (
				'id' => 5,
				'permission_id' => 5,
				'role_id' => 1,
			),
			5 => 
			array (
				'id' => 6,
				'permission_id' => 6,
				'role_id' => 1,
			),
		));
	}

}
