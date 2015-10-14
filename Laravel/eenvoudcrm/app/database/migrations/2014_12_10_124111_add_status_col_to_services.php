<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusColToServices extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('services',function($table){
			$table->integer('status_id')->unsigned();
			$table->foreign('status_id')->references('id')->on('statuses');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		//drop column
		Schema::table('services',function($table){
			$table->dropForeign('services_status_id_foreign');
			$table->dropColumn('status_id');
		});
	}

}
