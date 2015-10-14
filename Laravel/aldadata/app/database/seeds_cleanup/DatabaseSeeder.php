<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        // Add calls to Seeders here
        $this->call('UsersTableSeeder');
        $this->call('RolesTableSeeder');

    	$this->call('AdressesTableSeeder');
		$this->call('AirportsTableSeeder');
		$this->call('AssignedRolesTableSeeder');
		$this->call('CommentsTableSeeder');
		$this->call('CompaniesTableSeeder');
		$this->call('CompaniesContactsXrefTableSeeder');
		$this->call('CompaniesUsersXrefTableSeeder');
		$this->call('CompaniesVenuesXrefTableSeeder');
		$this->call('ContactTypesTableSeeder');
		$this->call('ContactsTableSeeder');
		$this->call('CountriesTableSeeder');
		$this->call('CurrenciesTableSeeder');
		$this->call('DatesTableSeeder');
		//$this->call('DocumentsTableSeeder');

        $this->call('EventsTableSeeder');
		$this->call('EventTicketTypesTableSeeder');
		$this->call('EventTicketsSoldTableSeeder');

		$this->call('EventsCompaniesXrefTableSeeder');
		$this->call('EventsContactsXrefTableSeeder');
		$this->call('EventsDatesXrefTableSeeder');
		$this->call('EventsTicketsXrefTableSeeder');
		$this->call('EventsUsersXrefTableSeeder');
		$this->call('EventsVenuesXrefTableSeeder');
		$this->call('HospitalityDetailsTableSeeder');
		$this->call('HotelsTableSeeder');
		$this->call('MigrationsTableSeeder');
		$this->call('MissingticketsalesautologinTableSeeder');
		$this->call('PasswordRemindersTableSeeder');

        $this->call('PermissionsTableSeeder');
		$this->call('PermissionRoleTableSeeder');
		$this->call('PicturesTableSeeder');

		$this->call('TaskeventsTableSeeder');
		$this->call('TaskfilesTableSeeder');
		$this->call('TaskgroupsTableSeeder');
		$this->call('TasktemplatesTableSeeder');
		$this->call('TicketsTableSeeder');
		$this->call('UserTypesXrefTableSeeder');

		$this->call('VenuesTableSeeder');
		$this->call('VenuesContactsXrefTableSeeder');
	}

}
