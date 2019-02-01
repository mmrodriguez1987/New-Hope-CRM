<?php

use Illuminate\Database\Seeder;
use newhopecrm\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Michael Rodriguez',
            'email' => 'mrodriguez@nissienterprise.com',
            'password' => bcrypt('Pa$$w0rd'), 
            'phone' => '7863550502',
        ]);

        User::create([
            'name' => 'Vianne Rodriguez',
            'email' => 'vrodriguez@nissienterprise.com',
            'password' => bcrypt('Pa$$w0rd'), 
            'phone' => '7863509949',
        ]);

        User::create([
            'name' => 'Edgar Ordonez',
            'email' => 'pastoredgar@newhopeinchrist.church',
            'password' => bcrypt('Pa$$w0rd'), 
            'phone' => '3053640200',
        ]);
    }
}
