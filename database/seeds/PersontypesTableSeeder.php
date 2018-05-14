<?php

use Illuminate\Database\Seeder;

class PersontypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persontypes = [
        [
          'name' => 'Adult',
          'user_creac_id' => 1,
          'user_modif_id' => 1,
          'active' => true
        ],[
          'name' => 'Kid',
          'user_creac_id' => 1,
          'user_modif_id' => 1,
          'active' => true
        ],[
          'name' => 'Young',
          'user_creac_id' => 1,
          'user_modif_id' => 1,
          'active' => true
        ],[
          'name' => 'Senior',
          'user_creac_id' => 1,
          'user_modif_id' => 1,
          'active' => true
        ],[
          'name' => 'Special Kid',
          'user_creac_id' => 1,
          'user_modif_id' => 1,
          'active' => true
        ]
      ];
        DB::table('persontypes')->insert($persontypes);
    }
}
