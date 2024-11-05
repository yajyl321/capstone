<?php

use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Auth\TeacherAuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
})->name('home');


Route::prefix('student')->group(function () {
    Route::get('register', [StudentAuthController::class, 'showRegisterForm'])->name('student.register');
    Route::get('login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
    Route::post('login', [StudentAuthController::class, 'login']);
    Route::get('/', [StudentController::class, 'showStudentIndex'])->name('student.index')->middleware('auth:student');
    Route::get('schedule', [StudentController::class, 'showStudentSchedule'])->name('student.schedule');
    Route::get('classroom', [StudentController::class, 'showStudentClassroom'])->name('student.classroom');
    Route::get('profile', [StudentController::class, 'showStudentProfile'])->name('student.profile');
    Route::post('logout', [StudentAuthController::class, 'logout'])->name('student.logout');
});


Route::prefix('teacher')->group(function(){
    Route::get('register', [TeacherAuthController::class, 'showRegisterForm'])->name('teacher.register');
    Route::get('login', [TeacherAuthController::class, 'showLoginForm'])->name('teacher.login');
});