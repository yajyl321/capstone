<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Teacher;
use App\Models\Schedule;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function showTeachers()
    {
        // Get all teachers
        $teachers = Teacher::all();
        $student = auth()->guard('student')->user();
        // Pass teachers to the view
        return view('student.booking', compact('teachers','student'));
    }

    public function showTeacherProfile($teacherId)
    {
        
        $student = auth()->guard('student')->user();
        $teacher = Teacher::findOrFail($teacherId);


        $schedules = Schedule::where('teacher_id', $teacherId)
            ->where('is_booked', false)
            ->get();


        $timeSlots = Schedule::distinct()->pluck('time_slot');

     
        return view('student.teacher-profile', compact('teacher', 'student', 'schedules', 'timeSlots'));
    }

    public function bookLesson($scheduleId)
    {
        $schedule = Schedule::findOrFail($scheduleId);
        
        if ($schedule->is_booked) {
            return redirect()->route('student.book-lesson')->with('error', 'This schedule is already booked.');
        }

        $student = Auth::guard('student')->user();
        $booking = new Booking([
            'schedule_id' => $schedule->id,
            'student_id' => $student->id,
            'teacher_id' => $schedule->teacher_id,
        ]);
        $booking->save();

        $schedule->is_booked = true;
        $schedule->save();

        return redirect()->route('student.schedule')->with('success', 'Lesson booked successfully!');
    }

    
}
