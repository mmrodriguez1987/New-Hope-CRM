<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persons = [
        [
          'firstname' => 'Michael',
          'lastname' => 'Rodriguez',
          'maritalstatus' => 'married',
          'birthdate' => Carbon::parse('1987-12-02'),
          'sex' => 'm',
          'address' => '721 Curtiss Parkway',
          'street' => 'Apt 6',
          'zipcode' => 33166,
          'city' => 'Miami Springs',
          'state' => 'FL',
          'email' => 'mrodriguez@nissienterprise.com',
          'cnt_emerg_name' => 'Vianney Rodriguez',
          'cnt_emerg_phone' => '786-350-9949',
          'cnt_emerg_address' => '721 Curtiss Parway, Apt 6, Miami Spring, FL 33166',
          'crt_employer_name' => 'Nissi Technology Enterprises Inc',
          'crt_employer_address' => '721 Curtiss Parway, Apt 6, Miami Spring, FL 33166',
          'position_id' => 1,
          'persontype_id' => 1,
          'user_creac_id' => 1,
          'user_modif_id' => 1,
          'active' => true
        ],[
          'firstname' => 'Vianney',
          'lastname' => 'Rodriguez',
          'maritalstatus' => 'married',
          'birthdate' => Carbon::parse('1983-09-04'),
          'sex' => 'F',
          'address' => '721 Curtiss Parkway',
          'street' => 'Apt 6',
          'zipcode' => 33166,
          'city' => 'Miami Springs',
          'state' => 'FL',
          'emial' => 'viangela84@hotmail.com',
          'cnt_emerg_name' => 'Vianney Rodriguez',
          'cnt_emerg_phone' => '786-350-9949',
          'cnt_emerg_address' => '721 Curtiss Parway, Apt 6, Miami Spring, FL 33166',
          'crt_employer_name' => 'Nissi Technology Enterprises Inc',
          'crt_employer_address' => '721 Curtiss Parway, Apt 6, Miami Spring, FL 33166',
          'position_id' => 1,
          'persontype_id' => 1,
          'user_creac_id' => 1,
          'user_modif_id' => 1,
          'active' => true
        ],
    ];
        DB::table('persons')->insert($persons);
    }
}
