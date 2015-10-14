<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasktemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasktemplates', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title', 45);
			$table->date('due_date')->nullable();
			$table->string('status', 45)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('group_id')->nullable();
			$table->integer('deadline_days_gap')->nullable()->default(0);
			$table->string('description')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasktemplates');
	}

}
