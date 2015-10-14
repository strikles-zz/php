<?php

class PermissionsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('permissions')->delete();
        
		\DB::table('permissions')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'manage_blogs',
				'display_name' => 'manage blogs',
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'manage_posts',
				'display_name' => 'manage posts',
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'manage_comments',
				'display_name' => 'manage comments',
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'manage_users',
				'display_name' => 'manage users',
			),
			4 => 
			array (
				'id' => 5,
				'name' => 'manage_roles',
				'display_name' => 'manage roles',
			),
			5 => 
			array (
				'id' => 6,
				'name' => 'post_comment',
				'display_name' => 'post comment',
			),
		));
	}

}
