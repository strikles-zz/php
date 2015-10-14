<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsContactsXrefTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events_contacts_xref', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contact_id')->index('`contact_idx`');
			$table->integer('event_id')->index('`company_idx`');
			$table->boolean('contact_is_employed')->nullable()->default(1);
			$table->boolean('contact_is_owner')->nullable();
			$table->date('contact_left_company')->nullable();
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
		Schema::drop('events_contacts_xref');
	}

}
