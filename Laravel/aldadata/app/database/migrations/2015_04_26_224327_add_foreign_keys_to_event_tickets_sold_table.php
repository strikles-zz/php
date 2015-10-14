<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEventTicketsSoldTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('event_tickets_sold', function(Blueprint $table)
		{
			$table->foreign('event_ticket_types_id', 'fk_event_tickets_sold_event_ticket_types1')->references('id')->on('event_ticket_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('event_tickets_sold', function(Blueprint $table)
		{
			$table->dropForeign('fk_event_tickets_sold_event_ticket_types1');
		});
	}

}
