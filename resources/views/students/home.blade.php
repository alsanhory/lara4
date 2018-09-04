@extends('layouts.main')

@section('title','Students')

@section('content')
{{\Session::get('message')}}
  @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
<div class="col-sm-4">
    <div class="panel panel-info">
        <div class="panel-body">
        {{Form::open()}}
        <div class="input-group">
        {{Form::label('name','Name')}}
        {{Form::text('name','',['class'=>'form-control','placeholder'=>'Write Student Name'])}}
        </div>

        <div class="input-group">
        {{Form::label('age','Age')}}
        {{Form::number('age','',['class'=>'form-control','placeholder'=>'Student Age'])}}
        </div>
        <br/>
        {{Form::submit('Save',['class'=>'btn btn-success'])}}
        {{Form::password('password')}}
        {{Form::password('password_confirmation')}}
        {{Form::close()}}
        </div>
        
    </div>
   
</div>
@if(count($students))
<table  class="table">
    <tr>
        <th>Student</th>
        <th>Age</th>
        <th>Edit</th>
        <tH>Delete</th>
    </tr>
    @foreach($students as $student)
    <tr>
        <td>{{$student->name}}</td>
        <td>{{$student->age}}</td>
        <td><span class="glyphicon glyphicon-pencil"></span></td>
        <td><span class="glyphicon glyphicon-trash"></span></td>
    </tr>
    @endforeach
</table>
@endif
@endsection