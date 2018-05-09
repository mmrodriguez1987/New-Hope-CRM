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
            ['name' => 'Administrator','email' => 'mrodriguez@nissienterprise.com','password' => bcrypt('Pa$$w0rd'), 'phone' => '7863550502']
        ];
        DB::table('users')->insert($users);
    }
}
