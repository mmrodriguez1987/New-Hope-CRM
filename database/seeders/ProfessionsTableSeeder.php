<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use newhopecrm\Models\Profession;

class ProfessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profession::factory()->count(50)->create();
    }
}