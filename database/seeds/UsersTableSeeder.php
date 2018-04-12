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
            ['name' => 'Administrator','email' => 'mrodriguez@nissienterprise.com','password' => 'Pa$$w0rd']
        ];
        DB::table('users')->insert($users);
    }
}
