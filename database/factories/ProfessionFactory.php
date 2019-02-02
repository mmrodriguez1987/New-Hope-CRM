<?php

use Faker\Generator as Faker;

$factory->define(newhopecrm\Profession::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word
    ];
});
