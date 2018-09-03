<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function welcome($name,$age){
        $myarr= array("name"=>$name,"age"=>$age);
        return view('nafoosa',$myarr);
    }

    public function index(){
        return view('welcome');
    }

    public function senndingdata(){
        $names=["Ibrahem","hamed","maram","mohd Ali", "Dina","Eman","Arifi"];
       
        
        return view('ourdata')
        ->with('names',$names)
        ->with('haja','its  value');
    }

    public function home(){
        return view('homepages.home');
    }
    public function about(){
        return view('homepages.about');
    }

    public function showCalc(){
        return view('calc');
    }

    public function calculate(Request $request){
        $sum= $request->num1 + $request->num2;
        return $sum;
        
    }
}
