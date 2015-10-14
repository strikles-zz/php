<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEventsUsersXrefTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('events_users_xref', function(Blueprint $table)
		{
			$table->foreign('user_id', 'fk_events_users_xref_users1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('event_id', 'fk_events_users_xref_events1')->references('id')->on('events')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('events_users_xref', function(Blueprint $table)
		{
			$table->dropForeign('fk_events_users_xref_users1');
			$table->dropForeign('fk_events_users_xref_events1');
		});
	}

}
