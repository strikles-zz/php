<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 100)->nullable();
			$table->integer('venue_id')->nullable()->index('`venue_idx`');
			$table->time('proposed_opening_time')->nullable();
			$table->time('proposed_closing_time')->nullable();
			$table->text('proposed_local_sponsors', 65535)->nullable();
			$table->text('promotional_activities', 65535)->nullable();
			$table->integer('eval_financial_score')->nullable();
			$table->text('eval_financial_text', 65535)->nullable();
			$table->integer('eval_marketing_score')->nullable();
			$table->text('eval_marketing_text', 65535)->nullable();
			$table->integer('eval_travel_score')->nullable();
			$table->text('eval_travel_text', 65535)->nullable();
			$table->integer('eval_production_score')->nullable();
			$table->text('eval_production_text', 65535)->nullable();
			$table->text('eval_extra_text', 65535)->nullable();
			$table->integer('created_by')->nullable();
			$table->string('minimal_age_limit', 45)->nullable();
			$table->date('booked_for_break_until')->nullable();
			$table->date('booked_for_setup_from')->nullable();
			$table->text('sound_restrictions', 65535)->nullable();
			$table->string('restrictions_on_merchandise_sales', 45)->nullable();
			$table->string('alcohol_license', 45)->nullable();
			$table->text('curfew', 65535)->nullable();
			$table->string('hotel1_name', 45)->nullable();
			$table->string('hotel1_website', 45)->nullable();
			$table->string('hotel1_travel_time_from_airport', 45)->nullable();
			$table->string('hotel1_travel_time_from_venue', 45)->nullable();
			$table->string('hotel2_name', 45)->nullable();
			$table->string('hotel2_travel_time_from_airport', 45)->nullable();
			$table->string('hotel2_travel_time_from_venue', 45)->nullable();
			$table->string('hotel2_website', 45)->nullable();
			$table->boolean('ticketsystem_enabled')->nullable();
			$table->date('ticketsystem_recording_startdate')->nullable();
			$table->boolean('ticketsystem_locked_for_promoter')->nullable();
			$table->boolean('ticketsystem_autoremind')->nullable();
			$table->integer('ticketsystem_autoremind_user_id')->nullable();
			$table->integer('currency_id')->nullable()->index('`fk_events_currencies1_idx`');
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
		Schema::drop('events');
	}

}
