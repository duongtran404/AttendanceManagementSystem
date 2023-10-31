<?php

namespace App\Http\Controllers;

use App\Model\Class_;
use Illuminate\Http\Request;
use App\Model\Lesson;
use App\Model\Location;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    public function index($id){
        $lessons = Lesson::with('location','class')->orderBy('begin_time','asc')->where('class_id','=', $id)->get();
        return view("admin.lesson.viewlesson",compact('lessons'));
    }
    public function create($id){
        $lessons = Lesson::with('class')->where('class_id','=', $id)->first();
        // $lessons = Lesson::find($id);
        // dd($lessons);
        return view("admin.lesson.createLesson", compact("lessons"));
    }
    public function store(Request $request,$id){
        $validated = $request->validate([
            "begin_time"    => "required|date",
            "location"      => "required|exists:locations,name",
            "address"       => "required|exists:locations,address",

        ]);
        $location = Location::where("name",$validated["location"])->where("address", $validated["address"])->first();

        // dd($validated);
        Lesson::create([
            "begin_time"    => $validated["begin_time"],
            "location_id"   => $location->id,
            "class_id"      => $id,
        ]);
        return redirect()->route("class")->with("success","done");
    }
    public function show($id){
        // $lesson = Lesson::find($id);
        // return view("", compact(""));
        return view("admin.lesson.editLesson");
    }
    public function edit($id){
        
    }
    public function update(Request $request, $id){
        $this->validate($request, [

        ]);
    }
}
