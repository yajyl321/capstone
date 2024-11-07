<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            StudentTableSeeder::class,
            TeachersTableSeeder::class,
            ScheduleSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     [
        //         'name' => 'jay',
        //         'email' => 'a@gmail.com',
        //         'password' => Hash::make('1234'),
        //         'role' => 'student',
                
        //     ],
        //     [
        //         'name' => 'a',
        //         'email' => 'b@gmail.com',
        //         'password' => Hash::make('1234'),
        //         'role' => 'student',
                
        //     ],
        //     [
        //         'name' => 'b',
        //         'email' => 'c@gmail.com',
        //         'password' => Hash::make('1234'),
        //         'role' => 'student',
                
        //     ],
        //     [
        //         'name' => 'c',
        //         'email' => 'd@gmail.com',
        //         'password' => Hash::make('1234'),
        //         'role' => 'student',
        //     ],
        // ]);
    }
}
