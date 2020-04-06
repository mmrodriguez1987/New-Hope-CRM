<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use newhopecrm\Model;

$factory->define(newhopecrm\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'role_id' => factory(newhopecrm\Role::class),
        'phone' => $faker->unique()->PhoneNumber,
        'remember_token' => str_random(10),
    ];
});
