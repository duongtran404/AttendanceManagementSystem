<?php

namespace App\Http\Controllers;

use App\Model\Attendance;
use App\Model\Class_;
use Illuminate\Http\Request;
use App\Model\Lesson;
use App\Model\Location;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use function PHPUnit\Framework\returnSelf;

class LessonController extends Controller
{
    public function index($id){
        $lessons = Lesson::with('location','class')->orderBy('begin_time','asc')->where('class_id','=', $id)
        ->where('status','0')
        ->paginate(10);
        return view("admin.lesson.viewlesson",compact('lessons','id'));
    }
    public function create($id){
        $classes = Class_::with('class_subject')->where('id','=', $id)->first();
        $locations = Location::all();
        // dd($classes->name);
        return view("admin.lesson.createLesson", compact("classes","id","locations"));
    }
    public function store(Request $request,$id){

        $class = Class_::find($id);
        // dd($class->end_date);
        $validated = $request->validate([
            "location"      => "required",
            // "begin_time"    => "required|date|after:$class->begin_date|before:$class->end_date",
            "begin_time"    => "required|date|after:$class->begin_date",
        ]);

        // dd($validated);
        Lesson::create([
            "begin_time"    => $validated["begin_time"],
            "location_id"   => $validated["location"],
            "class_id"      => $id,
        ]);
        return redirect()->route("class")->with("success","Create new lesson is successfully");
    }
    public function show($id){
        $lessons = Lesson::with('class','location')->where('id','=',$id)->first();
        // dd($lessons->class);
        return view("admin.lesson.editLesson",compact("lessons","id"));
    }
    // public function edit($id){
        
    // }
    public function update(Request $request, $id){
        $validated = $request->validate([
            "begin_time"    => "required|date",
            "location"      => "required|exists:locations,name",
            "address"       => "required|exists:locations,address",

        ]);
        $location = Location::where("name",$validated["location"])->where("address", $validated["address"])->first();

        // dd($validated);
        Lesson::where('id','=',$id)->update([
            "begin_time"    => $validated["begin_time"],
            "location_id"   => $location->id,
            // "class_id"      => $id,
        ]);
        return redirect()->route("class")->with("success","Update lesson is successfully");
    }
    public function destroy($id){
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect()->back()->with("success","Lesson have moved into the trash");
    }
    public function archive($id){
        $lesson = Lesson::where('class_id',$id)->first();
        $lessons = Lesson::onlyTrashed()->orderBy("deleted_at")->where('class_id','=', $id)->get();
        return view("admin.lesson.archiveLesson",compact("lessons","lesson"));
    }
    public function hard_delete($id){
        $lesson = Lesson::onlyTrashed()->find($id);
        // dd($lesson);
        if($lesson){
            $lesson->forceDelete();
            return redirect()->back()->with("success","Hard delete is successfully");
        }else{
            return redirect()->route("class")->with("error","not found");
        }
    }
    public function restore(Request $request,$id){
        $lesson = Lesson::onlyTrashed()->find($id);
        if($lesson){
            $lesson->restore();
            return redirect()->route("class")->with("success","Restore is successfully");
        }else{
            return redirect()->route("class")->with("error","not found");
        }
    }
    public function indexReport($id){
        $class = Class_::find($id);
        $lessons = Lesson::with('location','class')->orderBy('begin_time','asc')->where('class_id','=', $id)->where('status','1')->get();
        return view("admin.lesson.viewLessonReport",compact('lessons','id'));
    }

}
