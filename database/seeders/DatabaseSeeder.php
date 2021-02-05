<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call(RolesTableSeeder::class);   
        $this->call(UsersTableSeeder::class);    
        $this->call(PositionsTableSeeder::class); 
        $this->call(ProfessionsTableSeeder::class); 
        $this->call(PersontypesTableSeeder::class); 
        $this->call(PersonsTableSeeder::class);        
    }
}
