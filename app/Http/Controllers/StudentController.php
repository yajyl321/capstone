<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Schedule;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function showStudentIndex()
    
    {
        $student = auth()->guard('student')->user();
        return view('student.index', compact('student'));
    }

    public function showStudentSchedule()
    {
        $student = auth()->guard('student')->user();
        $studentId = Auth::id();
        $studentLessons = Booking::where('student_id', $studentId)->with('teacher')->with('schedule')->get();
        return view('student.schedule', compact('student', 'studentLessons'));
        
    }

    public function showBookingForm()
    {
        $teachers = Teacher::all();
        // Log or inspect the teachers variable to ensure it's retrieved
        if ($teachers->isEmpty()) {
            return 'No teachers found';
        }
        return view('student.booking', compact('teachers'));
    }

    public function cancelLesson($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        
        
        if ($booking->student_id !== Auth::id()) {
            return redirect()->route('student.schedule')->with('error', 'Unauthorized action.');
        }

        
        $schedule = $booking->schedule;
        $schedule->is_booked = false;
        $schedule->save();

        
        $booking->delete();

        return redirect()->route('student.schedule')->with('success', 'Booking canceled successfully.');
        
    }

    public function showStudentClassroom()
    {
        $student = auth()->guard('student')->user();
        $studentId = Auth::id();
        $teacher = Booking::where('student_id', $studentId)
                        ->with('teacher')
                        ->get();
        
        return view('student.classroom', compact('student', 'teacher'));
    }
    
    public function showStudentProfile()
    {
        $student = auth()->guard('student')->user();
        return view('student.profile', compact('student'));
    }


}
