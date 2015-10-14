<?php

class TaskfilesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('taskfiles')->delete();
        
		\DB::table('taskfiles')->insert(array (
			0 => 
			array (
				'id' => 451,
				'path' => '17-rs3520ggb9-users_dt.php',
				'original_filename' => 'users_dt.php',
				'actions' => NULL,
				'taskevents_id' => 704,
				'users_id' => 1,
				'created_at' => '2015-03-17 15:39:12',
				'updated_at' => '2015-03-17 15:39:12',
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 473,
				'path' => '21-6wh404fgvi-048C0304LL~Lumberjack-with-Axe-Posters.jpg',
				'original_filename' => '048C0304LL~Lumberjack-with-Axe-Posters.jpg',
				'actions' => NULL,
				'taskevents_id' => 1445,
				'users_id' => 1,
				'created_at' => '2015-04-21 09:52:21',
				'updated_at' => '2015-04-21 09:52:21',
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 477,
				'path' => '21-18x426gvi-d1eba8_07f352883f654f95868ee6a9becd6139.jpg_srz_300_200_75_22_0.50_1.20_0.jpg',
				'original_filename' => 'd1eba8_07f352883f654f95868ee6a9becd6139.jpg_srz_300_200_75_22_0.50_1.20_0.jpg',
				'actions' => NULL,
				'taskevents_id' => 1781,
				'users_id' => 54,
				'created_at' => '2015-04-21 13:34:23',
				'updated_at' => '2015-04-21 13:34:23',
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => 478,
				'path' => '21-fr1igm0a4i-hoot.jpg',
				'original_filename' => 'hoot.jpg',
				'actions' => NULL,
				'taskevents_id' => 1781,
				'users_id' => 54,
				'created_at' => '2015-04-21 13:37:07',
				'updated_at' => '2015-04-21 13:37:07',
				'deleted_at' => NULL,
			),
			4 => 
			array (
				'id' => 479,
				'path' => '21-mqo1gx2yb9-hoot.jpg',
				'original_filename' => 'hoot.jpg',
				'actions' => NULL,
				'taskevents_id' => 1829,
				'users_id' => 54,
				'created_at' => '2015-04-21 14:55:15',
				'updated_at' => '2015-04-21 14:55:15',
				'deleted_at' => NULL,
			),
			5 => 
			array (
				'id' => 480,
				'path' => '21-htrm37hkt9-hoot.jpg',
				'original_filename' => 'hoot.jpg',
				'actions' => NULL,
				'taskevents_id' => 1829,
				'users_id' => 54,
				'created_at' => '2015-04-21 14:55:20',
				'updated_at' => '2015-04-21 14:55:20',
				'deleted_at' => NULL,
			),
			6 => 
			array (
				'id' => 481,
				'path' => '26-qxw84fs9k9-dropped text.txt',
				'original_filename' => 'dropped text.txt',
				'actions' => NULL,
				'taskevents_id' => 1860,
				'users_id' => 62,
				'created_at' => '2015-04-26 17:08:38',
				'updated_at' => '2015-04-26 17:08:38',
				'deleted_at' => NULL,
			),
		));
	}

}
