<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use newhopecrm\Models\Persontype;

class PersontypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persontype::factory()->count(50)->create();
    }
}
