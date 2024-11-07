<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'name' => 'Maria W Gillock',
                'email' => 'aria@gmail.com',
                'password' => Hash::make('1234'),
                'age'=> '28',
                'phone_number' => '3144720',
                'address'=>'779 Fieldcrest Road',
                'gender'=>'female',
                
            ],
            [
                'name' => 'Timothy M Yates',
                'email' => 'timothy@gmail.com',
                'password' => Hash::make('1234'),
                'age'=> '27',
                'phone_number' => '8163932',
                'address'=>'4327 Mandan Road',
                'gender'=>'male',
                
                
            ],
            [
                'name' => 'George M Kerr',
                'email' => 'george@gmail.com',
                'password' => Hash::make('1234'),
                'age'=> '27',
                'phone_number' => '7023544',
                'address'=>'3985 Sheila Lane',
                'gender'=>'male',
                
                
            ],
            [
                'name' => 'Jesse G Gill',
                'email' => 'd@gmail.com',
                'password' => Hash::make('1234'),
                'age'=> '28',
                'phone_number' => '5219391',
                'address'=>'3053 Small Street',
                'gender'=>'male',
                
                
            ],
        ]);
    }
}
