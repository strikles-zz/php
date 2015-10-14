<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('email')->unique();
			$table->string('password', 60);
			$table->rememberToken();

			$table->string('name');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('phone');
			$table->string('photo');

			$table->string('provider');
			$table->string('provider_id');

			$table->string('company_name');
			$table->string('company_address');
			$table->string('company_city');
			$table->string('company_country');
			$table->string('company_zip');
			$table->string('company_website');

			$table->date('birthdate');

			$table->integer('confirmed');
			$table->string('confirmation_code');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
