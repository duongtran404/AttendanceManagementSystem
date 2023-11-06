<?php

namespace App\Http\Controllers;

use App\Model\Class_;
use App\Model\User;
use App\Model\Users;
use Illuminate\Http\Request;
use App\Model\Attendance;
use App\Model\Class_member;
use App\Model\Lesson;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function show($id){
        $attendance = Lesson::with("class","attendance")
        ->where("id", $id)
        ->first();
        return view('admin.attendance.attendance',compact('attendance'));
    }
    public function attendancemark(Request $request, $id){
        $validated = $request->validate([
            'user_id'       => 'required',
            'status'        => 'required',
            'notes'         => 'nullable|max:200',
            'lesson_id'     => 'required',
        ]);
        // dd($validated,$id);
        $data_array = [
            'user_id'       => $validated['user_id'],
            'status'        => $validated['status'],
            'notes'         => $validated['notes'],
            'lesson_id'     => $validated['lesson_id'],

        ];
        // dd($data['status']);
        foreach ($data_array['user_id'] as $user_id) {
            $data = [
                'user_id'   => $user_id,
                'status'    => $data_array['status'][$user_id],
                'notes'     => $data_array['notes'][$user_id],
                'lesson_id' => $data_array['lesson_id'][$user_id],
            ];
            Attendance::create($data);
            
        }

        Lesson::where('id', $validated['lesson_id'])->update(['status'=> '1']);
        
        return redirect()->route('class')->with('success','Attendance is successfully');
    }
    public function viewAttendance($id){
        $lesson = Lesson::with("class","attendance")->where("id", $id)->first();
        $attendances = DB::table('attendances')
            ->join('users', 'attendances.user_id', '=', 'users.id')
            ->select('users.id','users.name as student_name', 'attendances.status', 'attendances.notes')
            ->where('attendances.lesson_id', $id)
            ->where('users.status','currently enrolled')
            ->get();     
        return view('admin.attendance.viewAttendance',compact('attendances','lesson'));
    }
    public function attendance_statistical($id){
        $lesson = Lesson::with('class')->where('class_id',$id)->first();
        $lessons = Lesson::with('class','attendance')->where('class_id',$id)->where('status','1')->get();
        $lessonStatistical = [];
        foreach($lessons as $lesson){
            $attendance = Attendance::where('lesson_id', $lesson->id)->where('status','present')->count();
            $totalLesson = Attendance::where('lesson_id', $lesson->id)->count();
            $statistical = round(($attendance/$totalLesson)*100);
            $absent = $totalLesson-$attendance;
            $lessonStatistical[] = [
                'lesson_id' =>$lesson->id,
                'subject'=>$lesson->class->name,
                'attendance'=>$attendance,
                'absent'=>$absent,
                'total'=>$totalLesson,
                'name'=> $lesson->class->name,
                'statistical'=>$statistical,
            ];
        }
    
        return view('admin.attendance.attendanceStatistical',compact('lessonStatistical','lesson'));
    }
    public function attendance_record($id){
        $lessons = Lesson::with('class')->where('status','1')->where('class_id',$id)->get();
        $lessons->count();

    }
}

