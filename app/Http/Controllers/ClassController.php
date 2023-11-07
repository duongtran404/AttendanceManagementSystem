<?php

namespace App\Http\Controllers;

use App\Model\Class_;

use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Class_member;
use App\Model\Class_subject;
use App\Model\Lesson;
use App\Model\Subject;
use App\Model\User;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class ClassController extends Controller
{
    //
    public function index(){
        $class = Class_::with('class_subject','user')->get();
        // dd($class);
        return view("admin.class.viewClass",compact("class"));
    }
    public function indexReport(){
        $class = Class_::with("class_subject","user")->get();
        // dd($class);
        return view("admin.class.viewClassReport",compact('class'));
    }
    public function create(){
        $subjects = Subject::all();
        $teachers = User::all()->where('role','teacher');
        // dd($teachers);
        return view('admin.class.createClass',compact('subjects','teachers'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'=> 'required',
            'subject'=> 'required',
            'teacher_name'=> 'required',
            'begin_date'=> 'required|date',
            'end_date'=> 'required|date|after:begin_date',
        ]);
        $user = User::where('name',$validated['teacher_name'])->first();
        $subject = Subject::where('name',$validated['subject'])->first();
        // dd($subject->id);
        // dd($user->id);
        $class = Class_::create([
            'name'=> $validated['name'],
            'user_id'=> $user->id,
            'begin_date'=> $validated['begin_date'],
            'end_date'=> $validated['end_date'],
        ]);
        Class_subject::create([
            'class_id'=> $class->id,
            'subject_id'=> $subject->id,
        ]);
        return redirect()->route('class')->with('success','Create new class is successfully');
    }

    public function edit($id){
        $class = Class_::findOrFail($id);
        $subjects = Subject::all();
        $subject = Class_subject::with('subject')->where('class_id',$id)->first();
        $teachers = User::all()->where('role','teacher');
        $teacher = Class_::with('user')->where('id',$id)->first();
        // dd($teacher->user->name);
        // dd($class->begin_date);

        return view('admin.class.editClass',compact('class','subjects','teachers','subject','teacher'));
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'name'          =>'required',
            'subject'       =>'required',
            'teacher_name'  =>'required',
            'begin_date'    =>'required|date',
            'end_date'      =>'required|date|after:begin_date',
        ]);
        // dd($validated);
        Class_::where('id',$id)->update([
            'name'          =>$validated['name'],
            'user_id'       =>$validated['teacher_name'],
            'begin_date'    =>$validated['begin_date'],
            'end_date'      =>$validated['end_date'],
        ]);
        Class_subject::where('class_id',$id)->update([
            'subject_id'    =>$validated['subject'],
        ]);
        return redirect()->route('class')->with('success','Update class is successfully');
    }
    public function destroy($id){
        $class = Class_::find($id);
        $class->delete();
        return redirect()->route('class')->with('success','delete is successfully');
    }
    public function archiveClass(){
        $class = Class_::onlyTrashed()->orderBy("deleted_at")->get();
        // dd($class);
        return view('admin.class.archiveClass',compact('class'));
    }
    public function restore($id){
        $class = Class_::onlyTrashed()->where('id',$id)->first();
        if($class){
            $class->restore();
            return redirect()->route('class')->with('success','Restore is successfully');
        }else{
            return redirect()->route('class')->with('error','not found');
        }
    }
    public function hard_delete($id){
        $class = Class_::onlyTrashed()->find($id);
        if($class){
            $class->forceDelete();
            return redirect()->route('class')->with('success','delete is successfully');
        }else{
            return redirect()->route('class')->with('error','not found');
        }
    }

    public function searchClass(Request $request){
        $search = $request->input('search');
        $class = Class_::with("class_subject","user")->where('name', 'like', '%' . $search . '%')->get();
        return view("admin.class.viewClassReport",compact('class'));
    }
    public function showClassMember($id){
        $members = Class_member::with('class','user')->where('class_id',$id)->paginate(10);
        $class = Class_::with('class_subject')->where('id','=', $id)->first();;
        // dd($class);
        return view('admin.class.class_member',compact('id','members','class'));
    }
    public function showStudent($id){
        $class = Class_member::where('class_id',$id)->get();
        $allStudent = User::all()->where('role','student')->where('status','currently enrolled');
        $studentInClass = $class->pluck('user_id')->all();
        $studentNotInClass = User::whereNotIn('id',$studentInClass)->where('role','student')->get();
        return view('admin.class.add_member',compact('id','studentNotInClass'));
    }
    public function add_member($id,Request $request){
        // dd($request->all());
        // dd($id);
        Class_member::create([
            'user_id'       => $id,
            'class_id'      => $request->input('class_id'),
        ]);
        return redirect()->back()->with('success','');
    }
    public function delete_member($id){
        Class_member::find($id)->delete();
        return redirect()->back()->with('success','');
    }
}
