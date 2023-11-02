<?php

namespace App\Http\Controllers;

use App\Model\Class_;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Lesson;

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

    public function searchClass(Request $request){
        $search = $request->input('search');
        $class = Class_::with("class_subject","user")->where('name', 'like', '%' . $search . '%')->get();
        return view("admin.class.viewClassReport",compact('class'));
    }
}
