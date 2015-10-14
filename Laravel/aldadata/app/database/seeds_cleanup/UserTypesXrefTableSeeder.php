<?php

class UserTypesXrefTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('user_types_xref')->delete();
        
		\DB::table('user_types_xref')->insert(array (
			0 => 
			array (
				'id' => 10,
				'user_id' => 60,
				'taskgroup_id' => 1,
				'created_at' => NULL,
				'updated_at' => NULL,
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 11,
				'user_id' => 63,
				'taskgroup_id' => 2,
				'created_at' => NULL,
				'updated_at' => NULL,
				'deleted_at' => NULL,
			),
		));
	}

}
