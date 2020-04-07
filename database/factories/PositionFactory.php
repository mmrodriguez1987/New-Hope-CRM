<?php

use Faker\Generator as Faker;

$factory->define(newhopecrm\Position::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'active' => $faker->boolean
    ];
});
