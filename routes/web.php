<?php

use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Auth\TeacherAuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;

use App\Http\Controllers\ScheduleController;


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

Route::get('trial', function () {
    return view('student.trial');
});




Route::prefix('student')->group(function () {

    Route::get('register', [StudentAuthController::class, 'showRegisterForm'])->name('student.register');
    Route::post('register', [StudentAuthController::class, 'register']); 
    Route::get('login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
    Route::post('login', [StudentAuthController::class, 'login']);

    Route::middleware('auth:student')->group(function () {
        Route::get('classroom', [StudentController::class, 'showStudentClassroom'])->name('student.classroom');
        Route::get('profile', [StudentController::class, 'showStudentProfile'])->name('student.profile');
        Route::get('profile/edit', [ProfileController::class, 'showStudentEdit'])->name('student.edit');
        Route::post('profile/update', [ProfileController::class, 'showStudentUpdate'])->name('student.update');
        Route::post('logout', [StudentAuthController::class, 'logout'])->name('student.logout');
    });
});

Route::prefix('student')->middleware('auth:student')->group(function () {
    Route::get('/', [StudentController::class, 'showStudentIndex'])->name('student.index');
    Route::get('book-lesson', [BookingController::class, 'showTeachers'])->name('student.book-lesson');
    Route::delete('cancel-lesson/{id}', [StudentController::class, 'cancelLesson'])->name('student.cancel-lesson');
    Route::get('teacher/{teacherId}', [BookingController::class, 'showTeacherProfile'])->name('student.teacher.profile'); 
    Route::post('book/{scheduleId}', [BookingController::class, 'bookLesson'])->name('student.book.lesson');
    Route::get('schedule', [StudentController::class, 'showStudentSchedule'])->name('student.schedule');
});


Route::prefix('teacher')->group(function () {
   
    Route::get('register', [TeacherAuthController::class, 'showRegisterForm'])->name('teacher.register');
    Route::post('register', [TeacherAuthController::class, 'register']); 
    Route::get('login', [TeacherAuthController::class, 'showLoginForm'])->name('teacher.login');
    Route::post('login', [TeacherAuthController::class, 'login']); 
    Route::middleware('auth:teacher')->group(function () {
        Route::get('/', [TeacherController::class, 'showTeacherIndex'])->name('teacher.index');
        Route::get('schedule', [TeacherController::class, 'showTeacherSchedule'])->name('teacher.schedule');
        Route::get('classroom', [TeacherController::class, 'showTeacherClassroom'])->name('teacher.classroom');
        Route::get('profile', [TeacherController::class, 'showTeacherProfile'])->name('teacher.profile');
        Route::get('profile/edit', [ProfileController::class, 'showTeacherEdit'])->name('teacher.edit');
        Route::post('profile/update', [ProfileController::class, 'showTeacherUpdate'])->name('teacher.update');
        Route::post('logout', [TeacherAuthController::class, 'logout'])->name('teacher.logout');
    });
});