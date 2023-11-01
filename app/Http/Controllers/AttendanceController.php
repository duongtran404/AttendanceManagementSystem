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
        
        return redirect()->route('class')->with('success','done');
    }

}
