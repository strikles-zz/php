<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEventTicketTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('event_ticket_types', function(Blueprint $table)
		{
			$table->foreign('events_id', 'fk_event_ticket_types_events1')->references('id')->on('events')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('event_ticket_types', function(Blueprint $table)
		{
			$table->dropForeign('fk_event_ticket_types_events1');
		});
	}

}
