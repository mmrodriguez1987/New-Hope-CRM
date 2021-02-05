<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use newhopecrm\Models\User;
use Illuminate\Support\Str;

class UserFactory extends Factory
{  
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'rol_id' =>  $this->faker->randomDigit, 
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
