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

Route::get('/', function () {
    return 'Hello Nafisa';
});

Route::get('/hi',function(){
    return view('nafoosa');
});

Route::get('hi/{zool}',function($zool){
    return view('nafoosa',['zool'=>$zool]);
});


Route::get('hi/{n}/age/{a}','TestingController@welcome');

Route::get('test','TestingController@index');