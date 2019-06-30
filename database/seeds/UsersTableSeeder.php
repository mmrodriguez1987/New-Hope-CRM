<?php

use Illuminate\Database\Seeder;
use newhopecrm\User;

class UsersTableSeeder extends Seeder
{    
    public function run()
    {
        User::create([
            'name' => 'Michael Rodriguez',
            'email' => 'mrodriguez@nissienterprise.com',
            'password' => bcrypt('Pa$$w0rd'), 
            'role_id' => 1,
            'phone' => '7863550502',
            'remember_token' => str_random(50),
        ]);

        User::create([
            'name' => 'Vianney Rodriguez',
            'email' => 'vrodriguez@nissienterprise.com',
            'password' => bcrypt('Pa$$w0rd'), 
            'role_id' => 1,
            'phone' => '7863509949',
            'remember_token' => str_random(50),
        ]);

        User::create([
            'name' => 'Edgar Ordonez',
            'email' => 'pastoredgar@newhopeinchrist.church',
            'password' => bcrypt('Pa$$w0rd'), 
            'role_id' => 1,
            'phone' => '3053640200',
            'remember_token' => str_random(50),
        ]);
    }
}