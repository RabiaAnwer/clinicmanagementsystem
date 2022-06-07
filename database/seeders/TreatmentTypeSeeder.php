<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TreatmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('treatment_types')->insert([
            [
                'typeof' => 'Scaling',
                'amount' => '5000'
            ],
            [
                'typeof' => 'Filling',
                'amount' => '3000'
            ],
            [
                'typeof' => 'Bracing',
                'amount' => '20000'
            ],
            [
                'typeof' => 'Root Canal',
                'amount' => '10000'
            ],
            [
                'typeof' => 'Denture',
                'amount' => '25000'
            ],
            [
                'typeof' => 'Soft Base Denture',
                'amount' => '50000'
            ]
        ]);
    }
}
