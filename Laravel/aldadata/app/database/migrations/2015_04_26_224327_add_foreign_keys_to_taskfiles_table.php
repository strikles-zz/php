<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTaskfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('taskfiles', function(Blueprint $table)
		{
			$table->foreign('taskevents_id', 'fk_taskfiles_taskevents1')->references('id')->on('taskevents')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('users_id', 'fk_taskfiles_users1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('taskfiles', function(Blueprint $table)
		{
			$table->dropForeign('fk_taskfiles_taskevents1');
			$table->dropForeign('fk_taskfiles_users1');
		});
	}

}
