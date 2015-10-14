<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserTypesXrefTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_types_xref', function(Blueprint $table)
		{
			$table->foreign('user_id', 'fk_user_types_xref_users1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('taskgroup_id', 'fk_user_types_xref_taskgroups1')->references('id')->on('taskgroups')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_types_xref', function(Blueprint $table)
		{
			$table->dropForeign('fk_user_types_xref_users1');
			$table->dropForeign('fk_user_types_xref_taskgroups1');
		});
	}

}
