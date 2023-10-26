<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(){
        return view("admin.lesson.viewlesson");
    }
    public function create(){
        return view("admin.lesson.createLesson");
    }
    public function store(Request $request){
        $this->validate($request,[

        ]);
    }
    public function show($id = null){
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
