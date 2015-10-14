<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMissingticketsalesautologinTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('missingticketsalesautologin', function(Blueprint $table)
		{
			$table->foreign('events_id', 'fk_missingticketsalesautologin_events1')->references('id')->on('events')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('users_id', 'fk_missingticketsalesautologin_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('missingticketsalesautologin', function(Blueprint $table)
		{
			$table->dropForeign('fk_missingticketsalesautologin_events1');
			$table->dropForeign('fk_missingticketsalesautologin_users1');
		});
	}

}
