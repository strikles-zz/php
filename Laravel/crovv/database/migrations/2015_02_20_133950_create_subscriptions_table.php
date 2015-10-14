<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscriptions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('start_date');
			$table->date('end_date');
            $table->integer('invoice_id')->nullable()->unsigned()->index();
            $table->integer('user_id')->nullable()->unsigned()->index();

            $table->foreign('invoice_id')->references('id')->on('invoices')
            	->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
            	->onDelete('cascade');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subscriptions');
	}

}
