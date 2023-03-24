<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users= User::all();
        return view('admin.user.list',compact('users'));
        
    }
// -------------------------------------------------------------------------------------------------------------------
    public function create(){
        return view('admin.user.create');
    }
// -------------------------------------------------------------------------------------------------------------------
    public function store(Request $request){
         // dd($request);
         // <!-- neu khong dien ten se bao loi -->
         $this->validate($request,
            [
                'name' =>'required|unique:users' ,
                'email'=>'required|unique:users|email' ,
                'password'=>'required|min:6|max:32' ,
                'confirm'=>'same:password' ,
                'is_admin' =>'required',
            ]
        );
        User::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),//Hash::make($request->password)
            'is_admin'=>$request->is_admin,
        ]);
        return redirect()->route('admin.user.index')->with('success','Create User successfully');
    }
// -------------------------------------------------------------------------------------------------------------------
    public function edit($id){
        $user=User::find($id);
        return view('admin.user.edit',compact('user'));

    }
// -------------------------------------------------------------------------------------------------------------------
    public function update(Request $request,$id){
            $this->validate($request,
                [
                    'name' =>'required|unique:users' ,
                    'is_admin' =>'required',
                    // 'email'=>'required|unique:users|email' ,
                    // 'password'=>'required|min:6|max:32' ,
                    // 'confirm'=>'same:password' ,
                ]
            );

        $user=User::find($id);

        $data=[
            'namr'=>$request->name,
            'is_admin'=>$request->is_admin,
        ];

        if($request->password){
            $this->validate($request,[
                'password'=>'required|min:6|max:32' ,
                'confirm'=>'same:password' ,
            ]);
            $data['password']=bcrypt($request->passwprd);
        }

        $user->update($data);
        return redirect()->route('admin.user.index',$id)->with('success','Update User successfully');
    }
// -------------------------------------------------------------------------------------------------------------------
    public function delete($id){
        User::where('id',$id)->delete();
        return redirect()->route('admin.user.index')->with('success','Delete User successfully');
    }
}
