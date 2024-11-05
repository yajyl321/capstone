<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
