<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contact_type_id')->index('`contact_type_idx`');
			$table->string('function', 45)->nullable();
			$table->string('first_name', 45)->nullable();
			$table->string('last_name', 45)->nullable();
			$table->integer('address_id')->nullable()->index('`address_idx`');
			$table->text('references', 65535)->nullable();
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
		Schema::drop('contacts');
	}

}
