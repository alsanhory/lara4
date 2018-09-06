
        {{Form::open()}}
            {{Form::label('name','Name')}}
            {{Form::text('name','',['class'=>'form-control'])}}
            <br/>
            {{Form::label('email',"Email")}}
            {{Form::text('email','',['class'=>'form-control'])}}
            <br/>
            {{Form::label('password','Password')}}
            {{Form::password('password',['class'=>'form-control'])}}
            <br/>
            {{Form::label('password_confirmation','Confirm Password')}}
            {{Form::password('password_confirmation',['class'=>'form-control'])}}
            <br/>
            {{Form::submit('Register',['class'=>'btn btn-primary'])}}
        {{Form::close()}}
       