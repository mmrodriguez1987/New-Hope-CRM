<?php

use Faker\Generator as Faker;

$factory->define(newhopecrm\Person::class, function (Faker $faker) {
    return [
        'firstname' => $faker->name,
        'lastname' => $faker->name,
        'maritalstatus' => $faker->name,
        'birthday' => $faker->dateTime($max = 'now', $timezone = null),
        'sex' => $faker->relaText($maxNbChars =2, $indexSize = 2),
        'address'=> $faker->address,
        'street'=> $faker->sentence,
        'state'=>$faker->state,
        'zipcode'=>$faker->postalcode,
        'city'=>$faker->city,
        'email' => $faker->unique()->safeEmail,
        'cnt_emerg_name' => $faker->name,
        'cnt_emerg_phone' => $faker->cellNumber,
        'cnt_emerg_address' => $faker->address, 
        'crt_employer_name' => $faker->name,
        'crt_employer_address' => $faker->address,
        'position_id' => function() {
            return firstOrFactory(\App\Position::class);
        }, 
        'persontype_id' => function() {
            return firstOrFactory(\App\Persontype::class);
        }, 
        'user_creac_id' => function() {
            return firstOrFactory(\App\User::class);
        }, 
        'user_modif_id' => function() {
            return firstOrFactory(\App\User::class);
        },       
        'active' => $faker->boolean
    ];
});
