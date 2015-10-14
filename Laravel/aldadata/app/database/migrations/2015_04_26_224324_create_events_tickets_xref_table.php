<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTicketsXrefTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events_tickets_xref', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('event_id')->nullable()->index('`event_idx`');
			$table->integer('ticket_id')->nullable()->index('`ticket_idx`');
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
		Schema::drop('events_tickets_xref');
	}

}
