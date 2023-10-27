<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\User;
use Psy\VersionUpdater\Checker;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentController extends Controller
{
    public function index(){
        $students = User::all()->where("role","student");
        return view("admin.student.viewStudent",compact("students"));
    }
    public function create(){
        return view("admin.student.createStudent");
    }
    public function store(Request $request){

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
        return redirect()->route('student')->with('success','');
    }
    public function destroy(Request $request,$id){
        $student = User::find($id);
        // if($student->deleted_at != null){
        //     $student->forceDelete();
        //     return redirect()->route('student');
        // }
        $student->delete();
        return redirect()->route('student')->with('success','delete is successfull');
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
            return redirect()->route("archiveStudent")->with("success","hard delete is successfull");
        }else{
            return redirect()->route("archiveStudent")->with("success","not found");
        }
        // $student->history()->forceDelete();
        // return redirect()->route("archiveStudent")->with("success","hard delete is successfull");
    }
    public function restore(Request $request,$id){
        $student = User::onlyTrashed()->find($id);
        if($student){
            $student->restore();
            // dd($student);
            return redirect()->route("archiveStudent")->with("success","hard delete is successfull");
        }else{
            return redirect()->route("archiveStudent")->with("success","not found");
        }
    }
}
