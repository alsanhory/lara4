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
}
