<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('admin.login.index');
        
    }
    public function checkLogin(Request $request){
        if(Auth::attempt(
            [
            'email'=>$request->email,
            'password'=>$request->password
            ]
        )){
            return redirect('admin.post.index');
        }
        return redirect()->route('admin.auth.login')->with('errow','Failed');

    }
    public function store(){

    }
    public function edit(){

    }
    public function update(){

    }
    public function delete(){

    }
}
