<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tickets', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('type', 45)->nullable();
			$table->decimal('price', 10, 0)->nullable();
			$table->string('currency', 5)->nullable();
			$table->string('ticketscol', 45)->nullable();
			$table->integer('total_count')->nullable();
			$table->integer('sold_count')->nullable();
			$table->text('notes', 65535)->nullable();
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
		Schema::drop('tickets');
	}

}
