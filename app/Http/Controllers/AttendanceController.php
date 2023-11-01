<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use App\Model\Attendance;
use App\Model\Class_member;
use App\Model\Lesson;

class AttendanceController extends Controller
{
    public function show($id){
        $attendance = Lesson::with("class","attendance")->where("id", $id)->first();
        dd($attendance->class->class_member);
    //     $name = Class_member::with('users')->get();
    // dd($name,$name->first()->id, $name->first()->user);

    //     foreach ($name as $item){
    //         echo $item->user->name;
    return view('empty',compact('attendance'));
    }
    public function indexattendance(){
        return view("admin/attendance/attendanceList");
    }

}
