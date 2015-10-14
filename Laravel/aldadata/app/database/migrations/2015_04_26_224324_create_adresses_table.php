<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adresses', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('address', 45)->nullable();
			$table->string('postal_code', 45)->nullable();
			$table->string('city', 45)->nullable();
			$table->string('state_province', 45)->nullable();
			$table->integer('country_id')->index('`country_idx`');
			$table->string('phone', 45)->nullable();
			$table->string('phone2', 45)->nullable();
			$table->string('fax', 45)->nullable();
			$table->string('email', 45)->nullable();
			$table->string('website', 45)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adresses');
	}

}
