<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventTicketTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_ticket_types', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 45)->nullable();
			$table->float('price', 10, 0)->nullable();
			$table->integer('num_available')->nullable();
			$table->integer('order')->nullable();
			$table->integer('events_id')->index('`fk_event_ticket_types_events1_idx`');
			$table->timestamps();
			$table->softDeletes();
			$table->date('sales_start')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event_ticket_types');
	}

}
