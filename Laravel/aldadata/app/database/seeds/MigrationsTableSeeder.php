<?php

class MigrationsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('migrations')->delete();
        
		\DB::table('migrations')->insert(array (
			0 => 
			array (
				'migration' => '2013_02_05_024934_confide_setup_users_table',
				'batch' => 1,
			),
			1 => 
			array (
				'migration' => '2013_02_05_043505_create_posts_table',
				'batch' => 1,
			),
			2 => 
			array (
				'migration' => '2013_02_05_044505_create_comments_table',
				'batch' => 1,
			),
			3 => 
			array (
				'migration' => '2013_02_08_031702_entrust_setup_tables',
				'batch' => 1,
			),
			4 => 
			array (
				'migration' => '2013_05_21_024934_entrust_permissions',
				'batch' => 1,
			),
			5 => 
			array (
				'migration' => '2014_09_09_103315_aldaTables',
				'batch' => 2,
			),
			6 => 
			array (
				'migration' => '2014_09_25_112046_add_companies_venues_xref_table',
				'batch' => 3,
			),
			7 => 
			array (
				'migration' => '2014_09_29_093150_AddCompanyTypeToCompanyTable',
				'batch' => 4,
			),
			8 => 
			array (
				'migration' => '2014_09_29_094635_add_code_column_to_airports_table',
				'batch' => 5,
			),
			9 => 
			array (
				'migration' => '2015_04_26_224324_create_adresses_table',
				'batch' => 0,
			),
			10 => 
			array (
				'migration' => '2015_04_26_224324_create_airports_table',
				'batch' => 0,
			),
			11 => 
			array (
				'migration' => '2015_04_26_224324_create_assigned_roles_table',
				'batch' => 0,
			),
			12 => 
			array (
				'migration' => '2015_04_26_224324_create_comments_table',
				'batch' => 0,
			),
			13 => 
			array (
				'migration' => '2015_04_26_224324_create_companies_table',
				'batch' => 0,
			),
			14 => 
			array (
				'migration' => '2015_04_26_224324_create_companies_contacts_xref_table',
				'batch' => 0,
			),
			15 => 
			array (
				'migration' => '2015_04_26_224324_create_companies_users_xref_table',
				'batch' => 0,
			),
			16 => 
			array (
				'migration' => '2015_04_26_224324_create_companies_venues_xref_table',
				'batch' => 0,
			),
			17 => 
			array (
				'migration' => '2015_04_26_224324_create_contact_types_table',
				'batch' => 0,
			),
			18 => 
			array (
				'migration' => '2015_04_26_224324_create_contacts_table',
				'batch' => 0,
			),
			19 => 
			array (
				'migration' => '2015_04_26_224324_create_countries_table',
				'batch' => 0,
			),
			20 => 
			array (
				'migration' => '2015_04_26_224324_create_currencies_table',
				'batch' => 0,
			),
			21 => 
			array (
				'migration' => '2015_04_26_224324_create_dates_table',
				'batch' => 0,
			),
			22 => 
			array (
				'migration' => '2015_04_26_224324_create_documents_table',
				'batch' => 0,
			),
			23 => 
			array (
				'migration' => '2015_04_26_224324_create_event_ticket_types_table',
				'batch' => 0,
			),
			24 => 
			array (
				'migration' => '2015_04_26_224324_create_event_tickets_sold_table',
				'batch' => 0,
			),
			25 => 
			array (
				'migration' => '2015_04_26_224324_create_events_table',
				'batch' => 0,
			),
			26 => 
			array (
				'migration' => '2015_04_26_224324_create_events_companies_xref_table',
				'batch' => 0,
			),
			27 => 
			array (
				'migration' => '2015_04_26_224324_create_events_contacts_xref_table',
				'batch' => 0,
			),
			28 => 
			array (
				'migration' => '2015_04_26_224324_create_events_dates_xref_table',
				'batch' => 0,
			),
			29 => 
			array (
				'migration' => '2015_04_26_224324_create_events_tickets_xref_table',
				'batch' => 0,
			),
			30 => 
			array (
				'migration' => '2015_04_26_224324_create_events_users_xref_table',
				'batch' => 0,
			),
			31 => 
			array (
				'migration' => '2015_04_26_224324_create_events_venues_xref_table',
				'batch' => 0,
			),
			32 => 
			array (
				'migration' => '2015_04_26_224324_create_hospitality_details_table',
				'batch' => 0,
			),
			33 => 
			array (
				'migration' => '2015_04_26_224324_create_hotels_table',
				'batch' => 0,
			),
			34 => 
			array (
				'migration' => '2015_04_26_224324_create_missingticketsalesautologin_table',
				'batch' => 0,
			),
			35 => 
			array (
				'migration' => '2015_04_26_224324_create_password_reminders_table',
				'batch' => 0,
			),
			36 => 
			array (
				'migration' => '2015_04_26_224324_create_permission_role_table',
				'batch' => 0,
			),
			37 => 
			array (
				'migration' => '2015_04_26_224324_create_permissions_table',
				'batch' => 0,
			),
			38 => 
			array (
				'migration' => '2015_04_26_224324_create_pictures_table',
				'batch' => 0,
			),
			39 => 
			array (
				'migration' => '2015_04_26_224324_create_roles_table',
				'batch' => 0,
			),
			40 => 
			array (
				'migration' => '2015_04_26_224324_create_taskevents_table',
				'batch' => 0,
			),
			41 => 
			array (
				'migration' => '2015_04_26_224324_create_taskfiles_table',
				'batch' => 0,
			),
			42 => 
			array (
				'migration' => '2015_04_26_224324_create_taskgroups_table',
				'batch' => 0,
			),
			43 => 
			array (
				'migration' => '2015_04_26_224324_create_tasktemplates_table',
				'batch' => 0,
			),
			44 => 
			array (
				'migration' => '2015_04_26_224324_create_tickets_table',
				'batch' => 0,
			),
			45 => 
			array (
				'migration' => '2015_04_26_224324_create_user_types_xref_table',
				'batch' => 0,
			),
			46 => 
			array (
				'migration' => '2015_04_26_224324_create_users_table',
				'batch' => 0,
			),
			47 => 
			array (
				'migration' => '2015_04_26_224324_create_venues_table',
				'batch' => 0,
			),
			48 => 
			array (
				'migration' => '2015_04_26_224324_create_venues_contacts_xref_table',
				'batch' => 0,
			),
			49 => 
			array (
				'migration' => '2015_04_26_224327_add_foreign_keys_to_assigned_roles_table',
				'batch' => 0,
			),
			50 => 
			array (
				'migration' => '2015_04_26_224327_add_foreign_keys_to_event_ticket_types_table',
				'batch' => 0,
			),
			51 => 
			array (
				'migration' => '2015_04_26_224327_add_foreign_keys_to_event_tickets_sold_table',
				'batch' => 0,
			),
			52 => 
			array (
				'migration' => '2015_04_26_224327_add_foreign_keys_to_events_table',
				'batch' => 0,
			),
			53 => 
			array (
				'migration' => '2015_04_26_224327_add_foreign_keys_to_events_users_xref_table',
				'batch' => 0,
			),
			54 => 
			array (
				'migration' => '2015_04_26_224327_add_foreign_keys_to_missingticketsalesautologin_table',
				'batch' => 0,
			),
			55 => 
			array (
				'migration' => '2015_04_26_224327_add_foreign_keys_to_permission_role_table',
				'batch' => 0,
			),
			56 => 
			array (
				'migration' => '2015_04_26_224327_add_foreign_keys_to_taskevents_table',
				'batch' => 0,
			),
			57 => 
			array (
				'migration' => '2015_04_26_224327_add_foreign_keys_to_taskfiles_table',
				'batch' => 0,
			),
			58 => 
			array (
				'migration' => '2015_04_26_224327_add_foreign_keys_to_user_types_xref_table',
				'batch' => 0,
			),
		));
	}

}
