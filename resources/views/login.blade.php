@extends('layouts.main')
@section('content')
{{Form::open()}}
{{Form::text('name','',['placeholder'=>'Write an email'])}}
<br/>
{{Form::password('password',['placeholder'=>'Password'])}}
<br/>
{{Form::submit('login')}}

{{Form::close()}}

@endsection