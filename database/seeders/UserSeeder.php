<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Rabia',
                'email' => 'rabia@gmail.com',
                'role_id' => 1,
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Ali',
                'email' => 'ali@gmail.com',
                'role_id' => 1,
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Rimsha',
                'email' => 'rimsha@gmail.com',
                'role_id' => 2,
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Muneeb',
                'email' => 'muneeb@gmail.com',
                'role_id' => 2,
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Faizan',
                'email' => 'faizan@gmail.com',
                'role_id' => 3,
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Sajid',
                'email' => 'sajid@gmail.com',
                'role_id' => 3,
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Ayesha',
                'email' => 'ayesha@gmail.com',
                'role_id' => 3,
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Kainat',
                'email' => 'kainat@gmail.com',
                'role_id' => 3,
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Mohsin',
                'email' => 'mohsin@gmail.com',
                'role_id' => 3,
                'password' => Hash::make('12345678')
            ],

        ]);
    }
}
