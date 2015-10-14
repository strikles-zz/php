<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taskfiles', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('path', 4096)->nullable();
			$table->string('original_filename')->nullable();
			$table->string('actions', 45)->nullable();
			$table->integer('taskevents_id')->index('`fk_taskfiles_taskevents1_idx`');
			$table->integer('users_id')->unsigned()->index('`fk_taskfiles_users1_idx`');
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
		Schema::drop('taskfiles');
	}

}
