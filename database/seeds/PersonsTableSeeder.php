<?php

use Illuminate\Database\Seeder;
use newhopecrm\Person;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Person::class,300)->create();      
    }
}
