<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            [
                'name' => 'Bianca T Taylor',
                'email' => 'bianca@gmail.com',
                'password' => Hash::make('1234'),
                'phone_number' => '8082214',
                'age'=> '26',
                'gender'=>'female',
                'address'=>'623 Don Jackson Lane',
                
            ],
            [
                'name' => 'Katherine A Reddick',
                'email' => 'e@gmail.com',
                'password' => Hash::make('1234'),
                'age'=> '27',
                'phone_number' => '5209845',
                'address'=>'2789 Parkway Drive',
                'gender'=>'female',
                
            ],
            [
                'name' => 'Eva W Richardson',
                'email' => 'eva@gmail.com',
                'password' => Hash::make('1234'),
                'age'=> '25',
                'phone_number' => '4055609',
                'address'=>'1832 Musgrave Street',
                'gender'=>'female',
                
                
            ],
            [
                'name' => 'Amy R Wyatt',
                'email' => 'amy@gmail.com',
                'password' => Hash::make('1234'),
                'age'=> '30',
                'phone_number' => '3083544',
                'address'=>'2112 North Avenue',
                'gender'=>'female',
                
                
            ],
        ]);
    }
}
