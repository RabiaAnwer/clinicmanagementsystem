<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses')->insert([
            [
                'user_id' => 1,
                'inventory_id' => null,
                'date' => now(),
                'amount' => '1000'
            ],
            [
                'user_id' => null,
                'inventory_id' => 1,
                'date' => now(),
                'amount' => '1000'
            ],
            [
                'user_id' => null,
                'inventory_id' => 2,
                'date' => now(),
                'amount' => '1000'
            ],
            [
                'user_id' => 2,
                'inventory_id' => null,
                'date' => now(),
                'amount' => '2000'
            ]
        ]);
    }
}
