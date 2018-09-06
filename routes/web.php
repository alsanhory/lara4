<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/hi',function(){
    return view('nafoosa');
});

Route::get('hi/{zool}',function($zool){
    return view('nafoosa',['zool'=>$zool]);
});


Route::get('hi/{n}/age/{a}','TestingController@welcome');

Route::get('test','TestingController@index');

Route::get('ibrahem','TestingController@senndingdata');


Route::get('/','TestingController@home');
Route::get('about','TestingController@about');

Route::get('calc','TestingController@showCalc');
Route::post('calc','TestingController@calculate');



Route::get('students','StudentController@showstudents')->middleware('auth');
Route::group(array('middleware' => 'auth'), function() 
{
    
Route::post('students','StudentController@savestudent');
Route::get('students/{id}/delete','StudentController@deleteStudent');
Route::get('students/{id}/edit','StudentController@editSudent');
Route::post('students/{id}/edit','StudentController@updateStudent');
});


Route::get('/register',['uses'=>'UserController@showRegister','as'=>'register']);
Route::post('register','TestingController@register');










Route::get('login',['as'=>'login','uses'=>'UserController@login']);
Route::post('login','UserController@dologin');
Route::get('logout','UserController@logout');
