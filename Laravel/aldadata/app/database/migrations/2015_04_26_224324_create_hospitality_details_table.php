<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHospitalityDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hospitality_details', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contact_id')->nullable();
			$table->integer('venue_id')->nullable()->index('`venue_idx`');
			$table->integer('airport_id')->nullable()->index('`airport_idx`');
			$table->integer('first_hotel_option_id')->nullable()->index('`first_hotel_option_idx`');
			$table->integer('first_hotel_distance_from_airport')->nullable();
			$table->integer('first_hotel_distance_from_venue')->nullable();
			$table->integer('second_hotel_option_id')->nullable()->index('`second_hotel_option_idx`');
			$table->integer('second_hotel_distance_from_airport')->nullable();
			$table->integer('second_hotel_distance_from_venue')->nullable();
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
		Schema::drop('hospitality_details');
	}

}
