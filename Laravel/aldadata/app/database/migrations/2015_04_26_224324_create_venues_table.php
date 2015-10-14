<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVenuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venues', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('main_contact_id')->nullable()->index('`main_contact_idx`');
			$table->integer('address_id')->nullable()->index('`address_idx`');
			$table->string('name', 100)->nullable();
			$table->string('indoor_or_outdoor', 45)->nullable();
			$table->string('name_of_hall', 45)->nullable();
			$table->string('capacity', 45)->nullable();
			$table->string('dimension_height', 45)->nullable();
			$table->string('dimension_width', 45)->nullable();
			$table->string('dimension_length', 45)->nullable();
			$table->string('rigging_capacity', 45)->nullable();
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
		Schema::drop('venues');
	}

}
