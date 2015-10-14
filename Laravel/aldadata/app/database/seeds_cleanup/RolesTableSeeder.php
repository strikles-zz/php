<?php

class RolesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('roles')->delete();
        
		\DB::table('roles')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'admin',
				'created_at' => '2014-09-09 07:43:59',
				'updated_at' => '2014-09-09 07:43:59',
			),
			1 => 
			array (
				'id' => 3,
				'name' => 'User',
				'created_at' => '2014-09-09 08:09:59',
				'updated_at' => '2014-09-09 08:09:59',
			),
			2 => 
			array (
				'id' => 4,
				'name' => 'promoter',
				'created_at' => '2015-03-16 10:30:52',
				'updated_at' => '2015-03-16 10:30:52',
			),
		));
	}

}
