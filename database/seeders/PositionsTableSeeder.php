<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use newhopecrm\Models\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::factory()->count(50)->create();
    }
}
