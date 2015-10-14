<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMissingticketsalesautologinTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('missingticketsalesautologin', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('users_id')->unsigned()->index('`fk_missingticketsalesautologin_users1_idx`');
			$table->integer('events_id')->index('`fk_missingticketsalesautologin_events1_idx`');
			$table->string('token', 45)->nullable();
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
		Schema::drop('missingticketsalesautologin');
	}

}
