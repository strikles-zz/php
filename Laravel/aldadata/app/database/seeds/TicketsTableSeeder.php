<?php

class TicketsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tickets')->delete();
        
		\DB::table('tickets')->insert(array (
			0 => 
			array (
				'id' => 1,
				'type' => '2',
				'price' => '1',
				'currency' => '1',
				'ticketscol' => '1',
				'total_count' => 1,
				'sold_count' => 1,
				'notes' => '1',
				'updated_at' => '2014-09-29 10:01:27',
				'created_at' => '2014-09-29 09:34:35',
				'deleted_at' => NULL,
			),
		));
	}

}
