<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use Validator;
use Hash;
use Session;
use Auth;
class UserController extends Controller
{
    public function showRegister(){
        return view('register');
    }

    public function register(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed'
        ])->validate();
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        
        Session::flash('message','User Account');
        return redirect('register');
    }

    public function login(){
        return view('login');
    }

    public function dologin(Request $request){
      
        $name=$request->name;
        $password=$request->password;
        $at=Auth::attempt([
            'name'=>$name,
            'password'=>$password,
        ]);
        if($at){
            return redirect('students');
        } else {
            return back()->withInput()->withError('Wrong Username or password');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
