<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            [
                'treatment_id' => 1,
                'date' => now(),
                'paid' => 2500,
                'balance' => 3500
            ],
            [
                'treatment_id' => 2,
                'date' => now(),
                'paid' => 500,
                'balance' => 300
            ],
            [
                'treatment_id' => 3,
                'date' => now(),
                'paid' => 2500,
                'balance' => 3500
            ],
            [
                'treatment_id' => 6,
                'date' => now(),
                'paid' => 500,
                'balance' => 300
            ],
            [
                'treatment_id' => 5,
                'date' => now(),
                'paid' => 2500,
                'balance' => 3500
            ],
            [
                'treatment_id' => 8,
                'date' => now(),
                'paid' => 500,
                'balance' => 300
            ],
            [
                'treatment_id' => 3,
                'date' => now(),
                'paid' => 2500,
                'balance' => 3500
            ],
            [
                'treatment_id' => 3,
                'date' => now(),
                'paid' => 500,
                'balance' => 300
            ],
            [
                'treatment_id' => 2,
                'date' => now(),
                'paid' => 2500,
                'balance' => 3500
            ],
            [
                'treatment_id' => 2,
                'date' => now(),
                'paid' => 500,
                'balance' => 300
            ]
        ]);
    }
}
