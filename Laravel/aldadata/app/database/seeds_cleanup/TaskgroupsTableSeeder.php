<?php

class TaskgroupsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('taskgroups')->delete();
        
		\DB::table('taskgroups')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'Tour',
				'order' => 1,
				'created_at' => NULL,
				'updated_at' => '2015-04-23 12:22:14',
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'Technical',
				'order' => 4,
				'created_at' => NULL,
				'updated_at' => '2015-04-23 12:22:14',
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'Marketing',
				'order' => 2,
				'created_at' => NULL,
				'updated_at' => '2015-04-23 12:22:14',
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'Travel',
				'order' => 3,
				'created_at' => NULL,
				'updated_at' => '2015-04-23 12:22:14',
				'deleted_at' => NULL,
			),
			4 => 
			array (
				'id' => 5,
				'name' => 'all',
				'order' => 5,
				'created_at' => NULL,
				'updated_at' => NULL,
				'deleted_at' => NULL,
			),
		));
	}

}
