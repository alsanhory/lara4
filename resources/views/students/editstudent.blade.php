@extends('layouts.main')

@section('title','Students')

@section('content')

  @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
<div class="col-sm-4">
    <div class="panel panel-info">
        <div class="panel-body">
        {{Form::open()}}
        <div class="input-group">
        {{Form::label('name','Name')}}
        {{Form::text('name',$student->name,['class'=>'form-control','placeholder'=>'Write Student Name'])}}
        </div>

        <div class="input-group">
        {{Form::label('age','Age')}}
        {{Form::number('age',$student->age,['class'=>'form-control','placeholder'=>'Student Age'])}}
        </div>
        <br/>
        <a href='{{url('students')}}' class='btn btn-danger'>Cancel</a>
        {{Form::submit('Update',['class'=>'btn btn-success'])}}
      
        {{Form::close()}}
        </div>
        
    </div>
   
</div>

@endsection