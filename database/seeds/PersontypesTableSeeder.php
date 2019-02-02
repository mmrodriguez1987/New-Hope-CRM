<?php

use Illuminate\Database\Seeder;
use newhopecrm\Persontype;

class PersontypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Persontype::class,50)->create();
    }
}
