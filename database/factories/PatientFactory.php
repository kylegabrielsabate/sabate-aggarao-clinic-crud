<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        // Create 20 patients using the factory
        Patient::factory()
            ->count(20)
            // The sequence method gives us an index starting at 0
            ->sequence(fn ($sequence) => [
                // $sequence->index goes 0, 1, 2... 19
                // So 1001 + 0 = 1001, 1001 + 19 = 1020
                'id_number' => 'PT-' . str_pad(1001 + $sequence->index, 4, '0', STR_PAD_LEFT)
            ])
            ->create();
    }
}