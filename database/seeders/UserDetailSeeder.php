<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_details')->insert([
            [
                'user_id' => 1,
                'care_of' => 'Anwar',
                'age' => 20,
                'gender' => 'Female',
                'address' => 'Airport',
                'mobile_number' => '0900-78601',
                'phone_number' => '0900-78601'
            ],
            [
                'user_id' => 2,
                'care_of' => 'Sheikh',
                'age' => 22,
                'gender' => 'Male',
                'address' => 'Gulshan',
                'mobile_number' => '0900-78601',
                'phone_number' => '0900-78601'
            ],
            [
                'user_id' => 3,
                'care_of' => 'Jamal',
                'age' => 24,
                'gender' => 'Female',
                'address' => 'Saddar',
                'mobile_number' => '0900-78601',
                'phone_number' => '0900-78601'
            ],
            [
                'user_id' => 4,
                'care_of' => 'Rana',
                'age' => 26,
                'gender' => 'Male',
                'address' => 'Defence',
                'mobile_number' => '0900-78601',
                'phone_number' => '0900-78601'
            ],
            [
                'user_id' => 5,
                'care_of' => 'Awan',
                'age' => 28,
                'gender' => 'Male',
                'address' => 'Airport',
                'mobile_number' => '0900-78601',
                'phone_number' => '0900-78601'
            ],
            [
                'user_id' => 6,
                'care_of' => 'Shahid',
                'age' => 27,
                'gender' => 'Male',
                'address' => 'Malir Cantt',
                'mobile_number' => '0900-78601',
                'phone_number' => '0900-78601'
            ],
            [
                'user_id' => 7,
                'care_of' => 'Siddique',
                'age' => 21,
                'gender' => 'Female',
                'address' => 'Gulshan-e-Hadeed',
                'mobile_number' => '0900-78601',
                'phone_number' => '0900-78601'
            ],
            [
                'user_id' => 8,
                'care_of' => 'Siraj',
                'age' => 23,
                'gender' => 'Female',
                'address' => 'Port Qasim',
                'mobile_number' => '0900-78601',
                'phone_number' => '0900-78601'
            ],
            [
                'user_id' => 9,
                'care_of' => 'Kamran',
                'age' => 25,
                'gender' => 'Male',
                'address' => 'Airport',
                'mobile_number' => '0900-78601',
                'phone_number' => '0900-78601'
            ]

        ]);
    }
}
