<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function showStudentIndex()
    {
        return view('student.index');
    }

    public function showStudentSchedule()
    {
    // to check if student have schedule in the database
    if (Auth::guard('student')->check()) {
        $studentId = Auth::id();
        $studentLessons = Lesson::where('student_id', $studentId)->with('teacher')->get();
        return view('student.schedule', compact('studentLessons'))->with('teacherLessons', []);
    }
    // if not redirect
    return redirect()->route('student.login');
    }

    public function showStudentClassroom()
    {
        return view('student.classroom');
    }

    public function showStudentProfile()
    {
        return view('student.profile');
    }
}
