<?php

use Faker\Generator as Faker;

$factory->define(newhopecrm\Person::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'marital_status' => $faker->name,
        'birthdate' => $faker->dateTime($max = 'now', $timezone = null),
        'sex' => 'M',
        'cid' => $faker->ean13,
        'address'=> $faker->address,
        'street'=> $faker->sentence,
        'state'=> 'FL',
        'profession_id'=>rand(1,10),
        'postal_code'=>33018,
        'city'=>$faker->city,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->PhoneNumber,
        'cnt_emerg_name' => $faker->name,
        'cnt_emerg_phone' => $faker->phoneNumber,
        'cnt_emerg_address' => $faker->address, 
        'crt_employer_name' => $faker->name,
        'crt_employer_address' => $faker->address,
        'crt_employer_phone' => $faker->phoneNumber,
        'position_id' => rand(1,10), 
        'person_type_id' => rand(1,10), 
        'active' => $faker->boolean
    ];
});
