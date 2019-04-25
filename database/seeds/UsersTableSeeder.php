<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(\App\User::class, 10)->create();
        $admin = new \App\User();

        $admin->name = 'Adan Yañez';
        $admin->email = 'adancaym@hotmail.com';
        $admin->password = bcrypt('asd');
        $admin->save();
    }
}
