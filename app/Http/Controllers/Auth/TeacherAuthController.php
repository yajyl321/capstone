<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.teacher.register');
    }

    public function showLoginForm()
    {
        return view('auth.teacher.login');
    }

    public function register(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:teachers',
            'password' => 'required|string|min:1|confirmed',
        ]);

        
        $teacher = Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        Auth::guard('teacher')->login($teacher);
        return redirect()->route('teacher.index')->with('success', 'Registration successful! Welcome!');
    }


    public function login(Request $request)
    {
    //Verify email and password
    $credentials = $request->only('email', 'password');

    if (Auth::guard('teacher')->attempt($credentials)) {
        return redirect()->route('teacher.index')->with('success', 'Welcome to your dashboard!');
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
    }

    
    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.login');
    }
}
