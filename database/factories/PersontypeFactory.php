<?php

use Faker\Generator as Faker;

$factory->define(newhopecrm\Persontype::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'active' => $faker->boolean
    ];
});
