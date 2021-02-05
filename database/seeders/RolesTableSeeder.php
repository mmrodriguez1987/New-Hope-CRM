<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use newhopecrm\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=> 'admin']); //1
        Role::create(['name'=> 'manager']); //2
        Role::create(['name'=> 'suadmin']); //3
    }
}
