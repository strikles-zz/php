<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVenuesContactsXrefTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venues_contacts_xref', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('venue_id')->index('`venue_idx`');
			$table->integer('contact_id')->index('`contact_idx`');
			$table->string('relation', 45)->nullable();
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
		Schema::drop('venues_contacts_xref');
	}

}
