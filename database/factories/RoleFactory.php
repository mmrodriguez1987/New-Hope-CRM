<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use newhopecrm\Model;

$factory->define(newhopecrm\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
