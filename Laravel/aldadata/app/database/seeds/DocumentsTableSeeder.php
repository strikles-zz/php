<?php

class DocumentsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('documents')->delete();
        
		\DB::table('documents')->insert(array (
			0 => 
			array (
				'id' => 1,
				'type' => NULL,
				'title' => NULL,
				'description' => NULL,
				'url' => NULL,
				'meta' => NULL,
				'contact_id' => NULL,
				'company_id' => NULL,
				'event_id' => NULL,
				'hotel_id' => NULL,
				'hospitality_id' => NULL,
				'updated_at' => '2014-09-29 09:57:43',
				'created_at' => '2014-09-29 09:33:34',
				'deleted_at' => '2014-09-29 09:57:43',
			),
			1 => 
			array (
				'id' => 2,
				'type' => 'Infra',
				'title' => 'Infra',
				'description' => 'Infra',
				'url' => 'www.i.com',
				'meta' => '',
				'contact_id' => NULL,
				'company_id' => NULL,
				'event_id' => NULL,
				'hotel_id' => NULL,
				'hospitality_id' => NULL,
				'updated_at' => '2014-09-30 14:52:46',
				'created_at' => '2014-09-29 09:57:55',
				'deleted_at' => NULL,
			),
		));
	}

}
