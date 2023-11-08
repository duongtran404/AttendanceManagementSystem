<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index(){
        $teachers = DB::table('users')->where('role','teacher')->where('deleted_at',null)->paginate(10);
        return view('admin.teacher.viewTeacher',compact('teachers'));
    }
    public function create(){
        return view('admin.teacher.createTeacher');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name'          => 'required|min:3|max:50',
            'email'         => 'required|email|unique:users,email',
            'gerden'        =>'required',
            'phone_number'  =>'regex:/^0[0-9]{9}$/',
            'location'      => '',
            'notes'         =>'max:255',
        ]);
        $user = User::create([
            'name'          => $validated['name'],
            'email'         => $validated['email'],
            'gerden'        => $validated['gerden'],
            'location'      => $validated['location'],
            'phone_number'  => $validated['phone_number'],
            'notes'         => $validated['notes'],
            'role'          =>'teacher'
        ]);
        return redirect()->route('teacher')->with('success','create teacher is successfully');
    }
    public function edit($id){
        $teacher = DB::table('users')->where('role','teacher')->where('id',$id)->first();
        // dd($teacher);
        return view('admin.teacher.editTeacher',compact('teacher'));
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'name'          => 'required|min:3|max:50',
            'gerden'        =>'required',
            'phone_number'  =>'regex:/^0[0-9]{9}$/',
            'location'      => '',
            'notes'         =>'max:255',
        ]);
        User::where('id',$id)->update([
            'name'          => $validated['name'],
            'gerden'        => $validated['gerden'],
            'location'      => $validated['location'],
            'phone_number'  => $validated['phone_number'],
            'notes'         => $validated['notes'],
        ]);
        return redirect()->route('teacher')->with('success','Update is successfully');
    }
    public function destroy($id){
        $teacher = User::find($id);
        if($teacher){
            $teacher->delete();
            return redirect()->back()->with('success','delete is successfully');
        }else{
            return redirect()->back()->with('error','not found');
        }
    }

    public function archive(){
        $teachers = User::onlyTrashed()->where("role","teacher")->paginate(10);
        // dd($students);
        return view("admin.teacher.archiveTeacher",compact("teachers"));
    }
    public function hard_delete($id){
        $teacher = User::onlyTrashed()->find($id);
        if($teacher){
            $teacher->forceDelete();
            // dd($student);
            return redirect()->route("archiveTeacher")->with("success","Hard delete is successfully");
        }else{
            return redirect()->route("archiveTeacher")->with("error","not found");
        }
    }
    public function restore($id){
        $teacher = User::onlyTrashed()->find($id);
        if($teacher){
            $teacher->restore();
            return redirect()->route("archiveTeacher")->with("success","Restore is successfully");
        }else{
            return redirect()->route("archiveTeacher")->with("error","not found");
        }
    }
}
