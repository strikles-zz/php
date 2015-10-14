<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventTicketsSoldTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_tickets_sold', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('num_sold')->nullable();
			$table->integer('week')->nullable();
			$table->integer('year')->nullable();
			$table->date('sale_date');
			$table->integer('event_ticket_types_id')->index('`fk_event_tickets_sold_event_ticket_types1_idx`');
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
		Schema::drop('event_tickets_sold');
	}

}
