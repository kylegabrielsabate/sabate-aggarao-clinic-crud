<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $patientsToInsert = [];

        // Loop 20 times to prepare 20 patients
        for ($i = 1; $i <= 20; $i++) {
            
            // Generates: PT-101, PT-102, ... up to PT-120
            $patientId = 'PT-' . str_pad(100 + $i, 3, '0', STR_PAD_LEFT);

            $patientsToInsert[] = [
                // ✅ FIXED: Changed to 'patient_number' to match your actual database column!
                'patient_number' => $patientId,
                'first_name'     => $faker->firstName(),
                'last_name'      => $faker->lastName(),
                'birth_date'     => $faker->date('Y-m-d', '2005-01-01'),
                'sex'            => $faker->randomElement(['Male', 'Female']),
                'contact_number' => $faker->numerify('09#########'),
                'address'        => $faker->address(),
                'created_at'     => now(),
                'updated_at'     => now(),
            ];
        }

        // Insert all 20 directly into the database
        DB::table('patients')->insert($patientsToInsert);
        
        $this->command->info('✅ Successfully inserted 20 patients!');
    }
}