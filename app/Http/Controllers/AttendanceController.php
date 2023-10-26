<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index(){
        // $data = AttendanceCotroller::paginate(10);
        return view("admin/attendance/attendance");
    }
    public function indexattendance(){
        return view("admin/attendance/attendanceList");
    }
    public function show(Request $request, $id=null){
        // $request = Attendance::find($id);
        return view("admin/attendance/attendanceShow");
    }

}
