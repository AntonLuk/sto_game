<?php

use Illuminate\Database\Seeder;

class EntrustTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Role();
        $admin->name         = 'admin';
        $admin->display_name = 'Администратор';
        $admin->description  = 'Всемогущий';
        $admin->save();

        $user = \App\User::find(1);
        $role_user = new \App\RoleUser();
        $role_user->role_id = $admin->id;
        $role_user->user_id = $user->id;
        $role_user->save();

        $owner = new \App\Role();
        $owner->name         = 'user';
        $owner->display_name = 'Пользователь';
        $owner->description  = '...';
        $owner->save();
    }
}
