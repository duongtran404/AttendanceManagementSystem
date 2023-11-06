<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\Users;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = User::all()->where("role","student");
        return view("admin.student.viewStudent",compact("students"));
    }
    public function create(){
        return view("admin.student.createStudent");
    }
    public function show($id = null){
        $students = User::find($id);
        return view("admin.student.editStudent",compact("students"));
    }
    public function update(Request $request,$id){
        $validated = $request->validate([
            'name'              => 'required|min:3|max:30',
            'phone_number'      => 'required', //|regex:/^0[0-9]{9}$/'
            'location'          => 'required',
            'gerden'            => 'required',
            'status'            => 'nullable',
            'notes'             => 'nullable|max:255',
        ]);
        // dd($validated);
        User::where('id',$id)->update([
            'name'=> $validated['name'],
            'phone_number'=> $validated['phone_number'],
            'location'=> $validated['location'],
            'gerden'=> $validated['gerden'],
            'status'=> $validated['status'],
            'notes'=> $validated['notes'],
        ]);
        return redirect()->route('student')->with('success','Update student is successfully');
    }
    public function destroy(Request $request,$id){
        $student = User::find($id);
        $student->delete();
        return redirect()->route('student')->with('success','delete is successfully');
    }

    public function archive(){
        $students = User::onlyTrashed()->orderBy('deleted_at')->where("role","student")->get();
        // dd($students);
        return view("admin.student.archive",compact("students"));
    }
    public function hard_delete($id){
        $student = User::onlyTrashed()->find($id);
        if($student){
            $student->forceDelete();
            // dd($student);
            return redirect()->route("archiveStudent")->with("success","Hard delete is successfully");
        }else{
            return redirect()->route("archiveStudent")->with("error","not found");
        }
        // $student->history()->forceDelete();
        // return redirect()->route("archiveStudent")->with("success","hard delete is successfull");
    }
    public function restore(Request $request,$id){
        $student = User::onlyTrashed()->find($id);
        if($student){
            $student->restore();
            // dd($student);
            return redirect()->route("archiveStudent")->with("success","Restore is successfully");
        }else{
            return redirect()->route("archiveStudent")->with("error","not found");
        }
    }
    public function search(Request $request){
        $search = $request->input("search");
        $students = Users::where('name', 'like', '%' . $search . '%')->get();
        return view("admin.student.viewStudent",compact("students"));
    }
    public function status_statistical(){
        $currently_enrolled = User::where("status","currently enrolled")->count();
        $leave_of_absence = User::where("status","leave of absence")->count();
        $dropped_out = User::where("status","dropped out")->count();

        $sum = $currently_enrolled + $leave_of_absence + $dropped_out;

        $percent_ce = round(($currently_enrolled*100)/($sum));

        $percent_la = round(($leave_of_absence*100)/($sum));

        $percent_do = round(($dropped_out*100)/($sum));

        return view("admin.student.status_statistical",compact("currently_enrolled","leave_of_absence","dropped_out","percent_ce","percent_la","percent_do","sum"));
    }
}
