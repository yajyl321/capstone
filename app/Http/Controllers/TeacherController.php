<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Schedule;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function showTeacherIndex()
    {
        $teacher = auth()->guard('teacher')->user();
        return view('teacher.index', compact('teacher'));
    }

    public function showTeacherSchedule()
    {
    $teacher = auth()->guard('teacher')->user();
    return view('teacher.schedule', compact('teacher')); 
    }
  
    public function showTeacherClassroom()
    {
        $teacher = auth()->guard('teacher')->user();
        return view('teacher.classroom',compact('teacher'));
    }

    public function showTeacherProfile()
    {
        $teacher = auth()->guard('teacher')->user();
        return view('teacher.profile', compact('teacher'));
    }

    
}
