<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.student.register');
    }

    public function showLoginForm()
    {
        return view('auth.student.login');
    }

    public function register(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'password' => 'required|string|min:1|confirmed',
        ]);

        // Create a new student account from request
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Log in the student and redirect
        Auth::guard('student')->login($student);
        return redirect()->route('student.index')->with('success', 'Registration successful! Welcome!');
    }


    public function login(Request $request)
    {
    //Verify email and password
    $credentials = $request->only('email', 'password');

    if (Auth::guard('student')->attempt($credentials)) {
        return redirect()->route('student.index')->with('success', 'Welcome to your dashboard!');
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
    }

    
    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
    }
}
