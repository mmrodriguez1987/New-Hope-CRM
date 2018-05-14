<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
          [
            'name' => 'Mentor',
            'user_creac_id' => 1,
            'user_modif_id' => 1,
            'active' => true
          ],[
            'name' => 'Pastor',
            'user_creac_id' => 1,
            'user_modif_id' => 1,
            'active' => true
          ],[
            'name' => 'Diacono',
            'user_creac_id' => 1,
            'user_modif_id' => 1,
            'active' => true
          ],[
            'name' => 'Visitante Regular',
            'user_creac_id' => 1,
            'user_modif_id' => 1,
            'active' => true
          ],[
            'name' => 'Ministro',
            'user_creac_id' => 1,
            'user_modif_id' => 1,
            'active' => true
          ],[
            'name' => 'Profeta',
            'user_creac_id' => 1,
            'user_modif_id' => 1,
            'active' => true
          ],[
            'name' => 'Maestro',
            'user_creac_id' => 1,
            'user_modif_id' => 1,
            'active' => true
          ],
        ];
        DB::table('positions')->insert($positions);
    }
}
