<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documents', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('type', 45)->nullable();
			$table->string('title', 45)->nullable();
			$table->string('description', 45)->nullable();
			$table->string('url', 45)->nullable();
			$table->text('meta', 65535)->nullable();
			$table->integer('contact_id')->nullable()->index('`contact_idx`');
			$table->integer('company_id')->nullable()->index('`company_idx`');
			$table->integer('event_id')->nullable()->index('`event_idx`');
			$table->integer('hotel_id')->nullable()->index('`hotel_idx`');
			$table->integer('hospitality_id')->nullable()->index('`hospitality_idx`');
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
		Schema::drop('documents');
	}

}
