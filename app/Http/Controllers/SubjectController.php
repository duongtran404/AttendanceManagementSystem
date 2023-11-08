<?php

namespace App\Http\Controllers;

use App\Model\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index(){
        $subjects = DB::table("subjects")->paginate(10);
        return view("admin.subject.viewSubject",compact("subjects"));
    }
    public function create(){
        return view("admin.subject.createSubject");
    }
    public function store(Request $request){
        $validated = $request->validate([
            "name"=> "required",
            "credits"=> "required|integer|min:1",
            "notes"=> "nullable|max:255",
        ],[
            "min"=> "number of credits is not negative",
        ]);
        // dd($validated);
        Subject::create([
            "name"=> $validated["name"],
            "credits"=> $validated["credits"],
            "notes"=> $validated["notes"],
        ]);
        return redirect()->route("subject")->with("success","Create subject is successfully");
    }
    public function show($id){

    }
    public function edit($id){
        $subject = Subject::find($id);
        return view("admin.subject.editSubject",compact("subject"));
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            "name"=> "required",
            "credits"=> "required|integer|min:1",
            "notes"=> "nullable|max:255",
        ],[
            "min"=> "number of credits is not negative",
        ]);
        Subject::where("id",$id)->update([
            "name"=> $validated["name"],
            "credits"=> $validated["credits"],
            "notes"=> $validated["notes"],
        ]);
        return redirect()->route("subject")->with("success","update subject is successfully");
    }
    public function destroy($id){
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route("subject")->with("success","delete is successfully");
    }
}
