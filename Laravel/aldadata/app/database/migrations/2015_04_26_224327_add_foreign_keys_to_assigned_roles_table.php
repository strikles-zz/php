<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssignedRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assigned_roles', function(Blueprint $table)
		{
			$table->foreign('role_id', 'assigned_roles_role_id_foreign')->references('id')->on('roles')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('user_id', 'assigned_roles_user_id_foreign')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assigned_roles', function(Blueprint $table)
		{
			$table->dropForeign('assigned_roles_role_id_foreign');
			$table->dropForeign('assigned_roles_user_id_foreign');
		});
	}

}
