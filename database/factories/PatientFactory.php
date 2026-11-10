<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    public function definition(): array
    {
        return [
            // 'patient_no' is handled by the seeder below
            'first_name'     => $this->faker->firstName(),
            'last_name'      => $this->faker->lastName(),
            'birth_date'     => $this->faker->date('Y-m-d', '2005-01-01'), // Generates a random date before 2005
            'sex'            => $this->faker->randomElement(['Male', 'Female']),
            'contact_number' => $this->faker->numerify('09#########'), // Generates PH mobile format
        ];
    }
}