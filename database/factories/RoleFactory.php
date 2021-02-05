<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use newhopecrm\Models\Role;

class RoleFactory extends Factory
{

    protected $model = Role::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
