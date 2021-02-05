<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use newhopecrm\Models\Person;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::factory()->count(500)->create();      
    }
}
