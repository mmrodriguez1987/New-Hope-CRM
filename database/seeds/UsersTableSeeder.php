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
        $users = [
            ['name' => 'Michael Rodriguez','email' => 'mrodriguez@nissienterprise.com','password' => bcrypt('Pa$$w0rd'), 'phone' => '7863550502'],
            ['name' => 'Tester','email' => 'info@nissienterprise.com','password' => bcrypt('secret'), 'phone' => '7863550502']
        ];
        DB::table('users')->insert($users);
    }
}
