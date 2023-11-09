<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\lessonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
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

Route::get('/student/create',[StudentController::class,'create'])->name('createStudent');

Route::post('/student/create',[StudentController::class,'store']);

Route::get('/student/edit/{id}',[StudentController::class,'show'])->name('editStudent');

Route::post('/student/update/{id}',[StudentController::class, 'update'])->name('updateStudent');

Route::delete('/student/destroy/{id}',[StudentController::class,'destroy'])->name('deleteStudent');

Route::get('/student/archive',[StudentController::class, 'archive'])->name('archiveStudent');

Route::delete('/student/archive/delete/{id}',[StudentController::class,'hard_delete'])->name('hard-delete-student');

Route::get('/student/archive/restore/{id}',[StudentController::class,'restore'])->name('restore-student');

Route::get('/student/search',[StudentController::class,'search'])->name('searchStudent');

Route::get('/status-statistical',[StudentController::class,'status_statistical'])->name('status-statistical');




Route::get('/teacher',[TeacherController::class,'index'])->name('teacher');

Route::get('/teacher/create',[TeacherController::class,'create'])->name('createTeacher');

Route::post('/teacher/create',[TeacherController::class,'store']);

Route::get('/teacher/edit/{id}',[TeacherController::class,'edit'])->name('editTeacher');

Route::post('/teacher/edit/{id}',[TeacherController::class,'update']);

Route::delete('/teacher/destroy/{id}',[TeacherController::class,'destroy'])->name('deleteTeacher');

Route::get('/teacher/archive',[TeacherController::class,'archive'])->name('archiveTeacher');

Route::delete('/teacher/archive/delete/{id}',[TeacherController::class,'hard_delete'])->name('hard-delete-teacher');

Route::get('/teacher/archive/restore/{id}',[TeacherController::class,'restore'])->name('restore-teacher');




Route::get('lesson/{id}',[LessonController::class,'index'])->name('lesson');

Route::get('/lesson/create/{id}',[LessonController::class,'create'])->name('createLesson');

Route::post('/lesson/insert/{id}',[LessonController::class,'store'])->name('insertLesson');

Route::get('/lesson/edit/{id}',[LessonController::class,'show'])->name('editLesson');

Route::post('/lesson/update/{id}',[LessonController::class,'update'])->name('updateLesson');

Route::delete('/lesson/destroy/{id}',[lessonController::class,'destroy'])->name('deleteLesson');

Route::get('/lesson/archive/{id}',[lessonController::class, 'archive'])->name('archiveLesson');

Route::delete('/lesson/archive/delete/{id}',[LessonController::class,'hard_delete'])->name('hard-delete-lesson');

Route::get('/lesson/archive/restore/{id}',[LessonController::class,'restore'])->name('restore-lesson');




Route::get('/attendance/{id}',[AttendanceController::class,'show'])->name('attendance');

Route::post('/attendance/mark/{id}',[AttendanceController::class,'attendancemark'])->name('markAttendance');

Route::get('/lesson/attendance/list',[AttendanceController::class,'indexattendance'])->name('listAttendance');

Route::get('/lesson/attendance/show',[AttendanceController::class, 'show'])->name('showAttendance');

Route::get('/attendance-statistical/{id}',[AttendanceController::class,'attendance_statistical'])->name('attendance-statistical');



Route::get('lesson-report/{id}',[LessonController::class,'indexReport'])->name('lessonReport');

Route::get('lesson-report/show/{id}',[AttendanceController::class,'viewAttendance'])->name('viewAttendance');

Route::get('/attendance-record/{id}',[AttendanceController::class,'attendance_record'])->name('attendance-record');

Route::get('/class-report',[ClassController::class,'indexReport'])->name('classReport');



Route::get('/class',[ClassController::class,'index'])->name('class');

Route::get('/class/search',[ClassController::class,'searchClass'])->name('searchClass');


Route::get('/class/search-report',[ClassController::class,'searchClassReport'])->name('searchClassReport');

Route::get('/class/create',[ClassController::class,'create'])->name('createClass');

Route::post('/class/create',[ClassController::class,'store']);

Route::get('/class/edit/{id}',[ClassController::class,'edit'])->name('editClass');

Route::post('/class/edit/{id}',[ClassController::class,'update']);

Route::delete('/class/destroy/{id}',[ClassController::class,'destroy'])->name('deleteClass');

Route::get('/class/archive',[ClassController::class,'archiveClass'])->name('archiveClass');

Route::delete('/class/archive/delete/{id}',[ClassController::class,'hard_delete'])->name('hard-delete-class');

Route::get('/class/archive/restore/{id}',[ClassController::class,'restore'])->name('restore-class');

Route::get('/class/member/{id}',[ClassController::class,'showClassMember'])->name('class_member');

Route::get('/class/member/add/{id}',[ClassController::class,'showStudent'])->name('student-list');

Route::post('/class/member/add-member/{id}',[ClassController::class,'add_member'])->name('add-member');

Route::delete('/class/member/delete/{id}',[ClassController::class,'delete_member'])->name('deleteMember');



Route::get('/subject',[SubjectController::class,'index'])->name('subject');

Route::get('/subject/create',[SubjectController::class,'create'])->name('createSubject');

Route::post('/subject/create',[SubjectController::class,'store']);

Route::get('/subject/edit/{id}',[SubjectController::class,'edit'])->name('editSubject');

Route::post('/subject/edit/{id}',[SubjectController::class,'update']);

Route::delete('/subject/delete/{id}',[SubjectController::class,'destroy'])->name('deleteSubject');


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