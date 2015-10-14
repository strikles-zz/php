<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('PlanTableSeeder');
        $this->call('RoleTableSeeder');
        $this->call('UserTableSeeder');
    }

}

class PlanTableSeeder extends Seeder {

    public function run()
    {
        DB::table('plans')->delete();

        \App\Plan::create(
            [
                'content'     => 'Free content',
                'description' => 'Crovv Free',
                'price'       => '0',
                'title'       => 'Free',
            ]);

        \App\Plan::create(
            [
                'content'     => 'Expert content ',
                'description' => 'Crovv Expert',
                'price'       => '10',
                'title'       => 'Expert',
            ]);

        \App\Plan::create(
            [
                'content'     => 'Pro content ',
                'description' => 'Crovv Pro',
                'price'       => '10',
                'title'       => 'Pro',
            ]);
    }
}

class RoleTableSeeder extends Seeder {

    public function run()
    {
        // DB::table('role_user')->delete();
        DB::table('roles')->delete();

        \App\Role::create(
            [
                'name'         => 'Admin',
                'display_name' => 'Administrator',
                'description'  => 'Super User'
            ]);

        \App\Role::create(
            [
                'name'         => 'User',
                'display_name' => 'User',
                'description'  => 'Regular User'
            ]);
    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        // users
        DB::table('users')->delete();
        $user = \App\User::create(
            [
                'first_name'      => 'Claudio',
                'last_name'       => 'Neto',
                'name'            => 'Claudio Neto',
                'photo'           => 'images/icons/default_user.png',
                'company_name'    => 'eenvoudmedia',
                'company_address' => 'van diemenstraat',
                'company_zip'     => '1013',
                'company_city'    => 'amsterdam',
                'company_country' => 'Netherlands',
                'company_website'  => 'www.eenvoudmedia.nl',
                'confirmed'       => '1',
                'birthdate'       => '1978-08-04',
                'email'           => 'strikles@gmail.com',
                'password'        => bcrypt('xxx')
            ]);

        // groups
        DB::table('groups')->delete();
        $group = \App\Group::create(
            [
                'name'            => 'eenvoudmedia',
                'description'     => 'Test Group',
                'photo'           => 'images/icons/default_group.png',
                'website'         => 'www.eenvodmedia.nl',
                'country'         => 'netherlands',
                'city'            => 'amsterdam',
                'language'        => 'dutch',
                'meeting_time'    => '17:00',
                'meeting_weekday' => 5,
                'chairman_id'     => $user->id

            ]);

        // attach user to group 1
        $user->groups()->attach($group->id);

        // make user an admin
        $user->roles()->attach(1);

        // create a past group meeting
        DB::table('groupmeetings')->delete();

        $gm = \App\Groupmeeting::create(
            [
                'group_id'  => $group->id,
                'meeting_date'  => '2015-03-19 22:00'
            ]);

        // user attended meeting
        DB::table('groupmeetingattendees')->delete();

        \App\Groupmeetingattendees::create(
            [
                'meeting_id' => $gm->id,
                'user_id'    => $user->id
            ]);
    }
}
