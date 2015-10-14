<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsUsersXrefTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events_users_xref', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('event_id')->index('`fk_events_users_xref_events1_idx`');
			$table->integer('user_id')->unsigned()->index('`fk_events_users_xref_users1_idx`');
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
		Schema::drop('events_users_xref');
	}

}
