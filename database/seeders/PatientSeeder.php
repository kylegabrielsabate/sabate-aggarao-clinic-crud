<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Loop 20 times to create 20 patients
        for ($i = 1; $i <= 20; $i++) {
            
            // Generates: PT-1001, PT-1002, ... up to PT-1020
            // (Note: If you meant PT-101 to PT-120, change '1000 + $i' to '100 + $i')
            $patientId = 'PT-' . str_pad(1000 + $i, 4, '0', STR_PAD_LEFT); 

            Patient::create([
                // ⚠️ CRITICAL: Change these left-side names to match your EXACT migration column names!
                // Common alternatives: 'patient_id' instead of 'id_number', 'contact' instead of 'phone'
                
                'id_number'   => $patientId, 
                'first_name'  => $faker->firstName(),
                'last_name'   => $faker->lastName(),
                'age'         => $faker->numberBetween(18, 80),
                'gender'      => $faker->randomElement(['Male', 'Female', 'Prefer not to say']),
                'address'     => $faker->address(),
                'phone'       => $faker->phoneNumber(),
                'email'       => $faker->unique()->safeEmail(), // Added as it's common in clinics
                
                // Add any other required columns from your migration here 
                // e.g., 'date_of_birth' => $faker->date(),
            ]);
        }
    }
}