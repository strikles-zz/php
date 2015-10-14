<?php

class EventsContactsXrefTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('events_contacts_xref')->delete();
        
		\DB::table('events_contacts_xref')->insert(array (
			0 => 
			array (
				'id' => 1,
				'contact_id' => 29,
				'event_id' => 15,
				'contact_is_employed' => 1,
				'contact_is_owner' => NULL,
				'contact_left_company' => NULL,
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'contact_id' => 282,
				'event_id' => 34,
				'contact_is_employed' => 1,
				'contact_is_owner' => NULL,
				'contact_left_company' => NULL,
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 3,
				'contact_id' => 303,
				'event_id' => 72,
				'contact_is_employed' => 1,
				'contact_is_owner' => NULL,
				'contact_left_company' => NULL,
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => 4,
				'contact_id' => 309,
				'event_id' => 72,
				'contact_is_employed' => 1,
				'contact_is_owner' => NULL,
				'contact_left_company' => NULL,
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
		));
	}

}
