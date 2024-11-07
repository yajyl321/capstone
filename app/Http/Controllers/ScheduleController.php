<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Teacher;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function showTeacherSchedule()
    {
    $teacher = auth()->guard('teacher')->user();

    $schedules = $teacher->schedules;  
    return view('teacher.schedule', compact('schedules', 'teacher'));  // Make sure $schedules is passed to the view
    }

    public function book(Schedule $schedule)
    {
        $student = Auth::user(); 

        if ($schedule->is_booked) {
            return back()->with('error', 'This schedule is already booked.');
        }

        Booking::create([
            'schedule_id' => $schedule->id,
            'student_id' => $student->id,
        ]);

        $schedule->update(['is_booked' => true]);

        return back()->with('success', 'Schedule booked successfully.');
    }
}
