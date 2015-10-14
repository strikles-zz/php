<?php

class CompaniesUsersXrefTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('companies_users_xref')->delete();
	}

}
