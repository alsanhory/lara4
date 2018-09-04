<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Validator;
class StudentController extends Controller
{
    public function showstudents(){
        $students=Student::all();
        return view('students.home')
        ->with('students',$students);
    }

    public function savestudent(Request $req){
        $v=Validator::make($req->all(),[
            'name'=>'required|unique:students',
            'age'=>'required|min:2',
            'password'=>'required|confirmed'
        ])->validate();
        /*
        if($v->fails()){
            return back()->withInput()->withErrors($v);
        }
        */
        
        $student=new Student;
        $student->name=$req->name;
        $student->age=$req->age;
        $student->save();
        \Session::flash('message','Student Added');
        return redirect('students');
    }
}
