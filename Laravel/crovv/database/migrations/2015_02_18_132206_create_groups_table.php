<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('description');
			$table->string('country');
			$table->string('city');
            $table->string('website');
			$table->string('language');
			$table->string('photo');
			$table->time('meeting_time');
			$table->integer('meeting_weekday');
            $table->integer('chairman_id')->nullable()->unsigned();

            $table->foreign('chairman_id')->references('id')->on('users')
                ->onDelete('cascade');

			$table->timestamps();
		});

        Schema::create('user_group', function($table)
        {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('group_id')->references('id')->on('groups')
                ->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('groupinvites', function($table)
        {
        	$table->increments('id');
            $table->string('group_invite_code');
            $table->integer('group_id')->unsigned();
            $table->integer('inviter_id')->unsigned();
            $table->integer('invitee_id')->unsigned();

            $table->foreign('group_id')->references('id')->on('groups')
                ->onDelete('cascade');

            $table->foreign('inviter_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('invitee_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('groupmeetings', function($table)
        {
        	$table->increments('id');
            $table->dateTime('meeting_date');
            $table->integer('group_id')->unsigned();

            $table->foreign('group_id')->references('id')->on('groups')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('groupmeetingattendees', function($table)
        {
        	$table->increments('id');
            $table->integer('meeting_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('meeting_id')->references('id')->on('groupmeetings')
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
		Schema::drop('groups');
		Schema::drop('user_group');
		Schema::drop('groupinvites');
		Schema::drop('groupmeetings');
		Schema::drop('groupmeetingattendees');
	}

}
