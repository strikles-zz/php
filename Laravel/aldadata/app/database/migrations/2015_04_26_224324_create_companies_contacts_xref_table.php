<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesContactsXrefTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies_contacts_xref', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contact_id')->index('`contact_idx`');
			$table->integer('company_id')->index('`company_idx`');
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
		Schema::drop('companies_contacts_xref');
	}

}
