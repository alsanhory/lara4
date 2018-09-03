@extends('layouts.main')
@section('content')
<div class='col-lg-2'>
{{Form::open()}}
{{Form::label('num1','First Number')}}
{{Form::number('num1','',['class'=>'form-control'])}}
<br/>
{{Form::label('num2','Second Number')}}
{{Form::NUMBER('num2','',['class'=>'form-control'])}}
<br/>
{{Form::submit('Calcualte',['class'=>'btn btn-success'])}}
{{Form::close()}}
</div>
@endsection