<?php

use Illuminate\Database\Seeder;
use newhopecrm\Persontype;

class PersontypeTableSeeder extends Seeder
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
