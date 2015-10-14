<?php

class EventsUsersXrefTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('events_users_xref')->delete();
        
	}

}
