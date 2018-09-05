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


    public function deleteStudent($id){
        $student=Student::find($id);
        $student->delete();

        \Session::flash('message','Student Deleted');
        return redirect('students');
    }

    public function editSudent($id){
        $student=Student::where('id',$id)->first();
        return view('students.editstudent')->with('student',$student);
    }

    public function updateStudent(Request $request,$id){
        
        $student=Student::where('id','=',$id)->first();
        $student->name=$request->name;
        $student->age=$request->age;
        $student->save();

        \Session::flash('message','Student Updated');
        return redirect('students');
    }
}
