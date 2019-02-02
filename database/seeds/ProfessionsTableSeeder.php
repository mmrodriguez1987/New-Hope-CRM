<?php

use Illuminate\Database\Seeder;
use newhopecrm\Profession;

class ProfessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Profession::class,50)->create();
    }
}
