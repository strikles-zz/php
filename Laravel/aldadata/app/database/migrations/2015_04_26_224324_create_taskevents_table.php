<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskeventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taskevents', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('description', 45)->nullable();
			$table->date('due_date')->nullable();
			$table->integer('active')->nullable()->default(1);
			$table->string('status', 45)->nullable();
			$table->integer('group_id')->nullable();
			$table->integer('events_id')->index('`fk_taskevents_events1_idx`');
			$table->string('comment')->nullable();
			$table->integer('cnt_updated_comments')->nullable()->default(0);
			$table->integer('cnt_updated_files')->nullable()->default(0);
			$table->integer('updated_by')->unsigned()->nullable()->index('`fk_taskevents_users1_idx`');
			$table->timestamp('owner_changed_at');
			$table->integer('deadline_days_gap')->nullable()->default(0);
			$table->string('title')->nullable();
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
		Schema::drop('taskevents');
	}

}
