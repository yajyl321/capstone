<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $timeSlots = [
            '09:00 AM - 09:30 AM',
            '10:00 AM - 10:30 AM',
            '11:00 AM - 11:30 AM',
            '01:00 PM - 01:30 PM',
            '02:00 PM - 02:30 PM'
        ];

        
        $teachers = Teacher::all();

        foreach ($teachers as $teacher) {
            foreach ($daysOfWeek as $day) {
                foreach ($timeSlots as $timeSlot) {
                    Schedule::create([
                        'teacher_id' => $teacher->id,
                        'day_of_week' => $day,
                        'time_slot' => $timeSlot,
                        'is_booked' => false,
                    ]);
                }
            }
        }
    }
}
