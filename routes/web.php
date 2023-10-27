<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\lessonController;
use App\Http\Controllers\StudentController;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;

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



Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

Route::get('/register',[AuthController::class, 'register'])->name('register');

Route::post('/register',[AuthController::class, 'store']);

Route::get('/',[AuthController::class, 'login'])->name('login');

Route::post('/',[AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/student',[StudentController::class,'index'])->name('student');

// Route::get('/student/create',[StudentController::class,'create'])->name('createStudent');

Route::get('/student/edit/{id}',[StudentController::class,'show'])->name('editStudent');

Route::post('/student/update/{id}',[StudentController::class, 'update'])->name('updateStudent');

Route::delete('/student/destroy/{id}',[StudentController::class,'destroy'])->name('deleteStudent');

Route::get('/student/archive',[StudentController::class, 'archive'])->name('archiveStudent');

Route::delete('/student/archive/delete/{id}',[StudentController::class,'hard_delete'])->name('hard-delete-student');

Route::get('/student/archive/restore/{id}',[StudentController::class,'restore'])->name('restore-student');

Route::get('/lesson',[LessonController::class,'index'])->name('lesson');

Route::get('/lesson/create',[LessonController::class,'create'])->name('createLesson');

Route::get('/lesson/edit',[LessonController::class,'show'])->name('editLesson');

Route::get('/attendance',[AttendanceController::class,'index'])->name('attendance');

Route::get('/attendance/list',[AttendanceController::class,'indexattendance'])->name('listAttendance');

Route::get('/attendance/show',[AttendanceController::class, 'show'])->name('showAttendance');

// Route::prefix('admin')->group(function () {
//     Route::get('admin/dashboard',[DashboardController::class, 'index'])->name('dashboard');

//     Route::get('admin/register',[AuthController::class, 'register'])->name('register');

//     Route::post('admin/register',[AuthController::class, 'store']);

//     Route::get('/admin',[AuthController::class, 'login'])->name('login');

//     Route::post('/admin',[AuthController::class, 'authenticate']);

//     Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//     Route::get('/student',[StudentController::class,'index'])->name('student');

//     Route::get('/student/create',[StudentController::class,'create'])->name('createStudent');

//     Route::get('/student/edit',[StudentController::class,'show'])->name('editStudent');

//     Route::get('/lesson',[lessonController::class,'index'])->name('lesson');

//     Route::get('/lesson/create',[LessonController::class,'create'])->name('createLesson');

//     Route::get('/lesson/edit',[LessonController::class,'show'])->name('editLesson');

//     Route::get('/attendance',[AttendanceController::class,'index'])->name('attendance');

//     Route::get('/attendance/list',[AttendanceController::class,'indexattendance'])->name('listAttendance');
// });