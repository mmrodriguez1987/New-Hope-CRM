<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use newhopecrm\Models\Position;

class PositionFactory extends Factory
{
   
    protected $model = Position::class;
 
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'active' => $this->faker->boolean
        ];
    }
}
