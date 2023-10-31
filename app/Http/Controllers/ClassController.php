<?php

namespace App\Http\Controllers;

use App\Model\Class_;
use Illuminate\Http\Request;
use App\Http\Requests;


class ClassController extends Controller
{
    //
    public function index(){
        $class = Class_::with('class_subject','user')->get();
        // dd($class);
        return view("admin.class.viewClass",compact("class"));
    }
}
