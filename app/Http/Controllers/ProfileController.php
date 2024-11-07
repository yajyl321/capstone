<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use App\Models\Teacher;

class ProfileController extends Controller
{
    public function showStudentEdit()
    {
        $student = auth()->guard('student')->user();
        return view('student.profile_edit', compact('student'));
    }

    public function showTeacherEdit()
    {
        $teacher = auth()->guard('teacher')->user();
        return view('teacher.profile_edit', compact('teacher'));
    }

    public function showStudentUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer',
            'phone_number' => 'nullable|numeric',
            'address' => 'nullable|string',
            'gender' => 'nullable|string',
            'personality' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        
        $student = auth()->guard('student')->user(); 
    
        
        if ($request->hasFile('profile_picture')) {
            
            $path = 'student/student_pictures' . $student->name ; 
            
            
            $profilePicturePath = $request->file('profile_picture')->store($path, 'public');
            
            
            $student->profile_picture = $profilePicturePath;
        }
    
        
        $student->name = $request->input('name');
        $student->age = $request->input('age');
        $student->phone_number = $request->input('phone_number');
        $student->email = $request->input('email');
        $student->password = $request->input('password');
        $student->address = $request->input('address');
        $student->gender = $request->input('gender');
        $student->personality = $request->input('personality');
        
        
        $student->save();
    
       
        return redirect()->route('student.profile')->with('success', 'Profile updated successfully.');
    }

    public function showTeacherUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer',
            'phone_number' => 'nullable|numeric',
            'address' => 'nullable|string',
            'gender' => 'nullable|string',
            'personality' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        
        $teacher = auth()->guard('teacher')->user(); 
    
        
        if ($request->hasFile('profile_picture')) {
            
            $path = 'teacher/teacher_pictures/' . $teacher->name;
            
            
            $profilePicturePath = $request->file('profile_picture')->store($path, 'public');
            
            
            $teacher->profile_picture = $profilePicturePath;
        }
    
        
        $teacher->name = $request->input('name');
        $teacher->age = $request->input('age');
        $teacher->phone_number = $request->input('phone_number');
        $teacher->email = $request->input('email');
        $teacher->password = $request->input('password');
        $teacher->address = $request->input('address');
        $teacher->gender = $request->input('gender');
        $teacher->personality = $request->input('personality');
        $teacher->save();
    
        
        return redirect()->route('teacher.profile')->with('success', 'Profile updated successfully.');
    }
}
