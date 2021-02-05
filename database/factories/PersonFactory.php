<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use newhopecrm\Models\Person;

class PersonFactory extends Factory
{    
    protected $model = Person::class;
    
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'marital_status' => 'casado',
            'birthdate' => $this->faker->dateTime,
            'sex' => 'M',
            'cid' => $this->faker->ssn,
            'address'=> $this->faker->streetAddress,
            'street'=> $this->faker->streetName,
            'state'=> $this->faker->stateAbbr,
            'profession_id'=> 1 ,
            'postal_code'=> 33015,
            'city'=> $this->faker->city,
            'email' => $this->faker->unique->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'cnt_emerg_name' => $this->faker->name,
            'cnt_emerg_phone' => $this->faker->phoneNumber,
            'cnt_emerg_address' => $this->faker->streetName, 
            'crt_employer_name' => $this->faker->name,
            'crt_employer_address' => $this->faker->streetAddress,
            'crt_employer_phone' => $this->faker->phoneNumber,
            'position_id' =>  $this->faker->randomDigit, 
            'person_type_id' =>  $this->faker->randomDigit, 
            'active' => $this->faker->boolean
        ];
    }
}
