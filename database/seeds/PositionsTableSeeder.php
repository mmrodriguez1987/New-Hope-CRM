<?php

use Illuminate\Database\Seeder;
use newhopecrm\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Position::class,50)->create();
    }
}
