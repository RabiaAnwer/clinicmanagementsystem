<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('treatments')->insert([
            [
                'user_id' => 5,
                'treatment_date' => now(),
                'typeof_id' => '1',
                'description' => 'First Visit'
            ],
            [
                'user_id' => 6,
                'treatment_date' => now(),
                'typeof_id' => '2',
                'description' => 'First Visit'
            ],
            [
                'user_id' => 7,
                'treatment_date' => now(),
                'typeof_id' => '3',
                'description' => 'First Visit'
            ],
            [
                'user_id' => 8,
                'treatment_date' => now(),
                'typeof_id' => '4',
                'description' => 'First Visit'
            ],
            [
                'user_id' => 9,
                'treatment_date' => now(),
                'typeof_id' => '5',
                'description' => 'First Visit'
            ],
            [
                'user_id' => 5,
                'treatment_date' => now(),
                'typeof_id' => '1',
                'description' => 'First Visit'
            ],
            [
                'user_id' => 6,
                'treatment_date' => now(),
                'typeof_id' => '2',
                'description' => 'First Visit'
            ],
            [
                'user_id' => 7,
                'treatment_date' => now(),
                'typeof_id' => '3',
                'description' => 'First Visit'
            ],
            [
                'user_id' => 8,
                'treatment_date' => now(),
                'typeof_id' => '4',
                'description' => 'First Visit'
            ],
            [
                'user_id' => 9,
                'treatment_date' => now(),
                'typeof_id' => '5',
                'description' => 'First Visit'
            ]
        ]);
    }
}
