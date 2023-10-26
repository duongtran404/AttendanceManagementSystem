<?php

namespace App\Http\Controllers;

use App\Model\Users;
use App\User;
// use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public $users;
    public function __construct(){
        $this->users = new Users();
    }
    public function register(){
        return view('admin.auth.register');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name'              => 'required|min:0|max:30',
            'email'             => 'required|email|unique:users,email',
            'password'          => 'required|min:1|confirmed',
            'role'              => 'required',
            'phone_number'      => 'required', //|regex:/^0[0-9]{9}$/'
            'location'          => 'required',
            'gerden'            => 'required',
            'department'        => 'nullable',
            'status'            => 'nullable',
            'title'             => 'nullable',
            'notes'             => 'nullable|max:255',
        ]);

        // dd($validated);
        User::create([
            'name'=> $validated['name'],
            'email'=> $validated['email'],
            'password'=> Hash::make($validated['password']),
            'role'=> $validated['role'],
            'location'=> $validated['location'],
            'gerden'=> $validated['gerden'],
            'phone_number'=> $validated['phone_number'],
            'department'=> $validated['department'],
            'status'=> $validated['status'],
            'title'=> $validated['title'],
            'notes'=> $validated['notes'],
        ]);

        // $dataInsert = [
        //     $request->name,
        //     $request->email,
        //     Hash::make($request->password),
        //     $request->role,
        //     $request->phone_number,
        //     $request->location,
        //     $request->department,
        //     $request->status,
        //     $request->title,
        //     $request->notes,
        // ];

        // $this->users->addUser($dataInsert);


        return redirect()->route('login')->with('status','Register is successfully');
    }
    public function login(){
        return view('admin.auth.login');
    }
    public function authenticate(Request $request){

        $validated = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:1',
        ]);
        if(auth()->attempt($validated)){
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success','loggin is successfully');
        }
        return redirect()->route('login')->withErrors([
            'email' => "No matching user found with the provided email and password"
        ]);

    }
    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken ();

        return redirect()->route('login');
    }
}