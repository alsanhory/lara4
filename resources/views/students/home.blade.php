@extends('layouts.main')

@section('title','Students')

@section('content')
<div class="container">
@if (Session::has('message'))
          <div class="alert alert-success"><span class="glyphicon glyphicon-info-sign"></span>{{ Session::get('message') }}</div>
          @endif
          @if (!empty($errors))
             @foreach($errors->all() as $err)

               <div class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> {{ $err }}</div>
            @endforeach
          @endif 

<div class="row">
<div class="panel panel-primary">
        <div class="panel-heading">Home</div>
        <div class="panel-body">
    <div class="row">
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
        {{Form::submit('Save',['class'=>'btn btn-primary'])}}
      
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
        <td><a href="{{url('students/'. $student->id. '/edit')}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
        <td><a href="{{url('students/'.$student->id.'/delete')}}" onclick="return confirm('Are you sure nigga?')"><span class="glyphicon glyphicon-trash"></span></a></td>
    </tr>
    @endforeach
</table>
@endif
</div>
</div>
        </div>
    </div>
</div>
@endsection