<?php

use Faker\Generator as Faker;

$factory->define(newhopecrm\Person::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_me' => $faker->name,
        'marital_status' => $faker->name,
        'birthday' => $faker->dateTime($max = 'now', $timezone = null),
        'sex' => $faker->relaText($maxNbChars =2, $indexSize = 2),
        'address'=> $faker->address,
        'street'=> $faker->sentence,
        'state'=>$faker->state,
        'postal_code'=>$faker->postalcode,
        'city'=>$faker->city,
        'email' => $faker->unique()->safeEmail,
        'cnt_emerg_name' => $faker->name,
        'cnt_emerg_phone' => $faker->cellNumber,
        'cnt_emerg_address' => $faker->address, 
        'crt_employer_name' => $faker->name,
        'crt_employer_address' => $faker->address,
        'position_id' => function() {
            return firstOrFactory(\newhopecrm\Position::class);
        }, 
        'persontype_id' => function() {
            return firstOrFactory(\newhopecrm\Persontype::class);
        },        
        'active' => $faker->boolean
    ];
});
