<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Validator;
use Mail;
class StudentController extends Controller
{
    public function showstudents(){
        $data=array("name"=>"sanhory");
        $pdf = \PDF::loadView('myemail', $data);
        return $pdf->download('haaj.pdf');
        $user=\Auth::user();
        //return "Hello ". $user->name;
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
        
        $f=$req->file('mypic');
        $filename=$f->getClientOriginalName();
        $f->move('imgs',$filename);
        
        $student=new Student;
        $student->name=$req->name;
        $student->image=$filename;
        $student->age=$req->age;
        $student->save();
        $data=array("email"=>"elrayah.alsanhory@gmail.com","subject"=>"Welcomming","name"=>$req->name);
        Mail::send(['html'=>'myemail'],$data,function($message) use ($data){
            $message->to($data['email'])->subject($data['subject']);
            $message->from('sanhory@sudatel.sd','Elrayah Sanhory');
        });

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
