@extends('main')

@section('title','| Register')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-spacing-left form-spacing-top">

            {!! Form::open() !!}
                {{Form::label('name','Name: ')}}
                {{Form::text('name',null,['class'=>'form-control'])}}

                {{Form::label('email','Email: ')}}
                {{Form::email('email',null,['class'=>'form-control'])}}

                {{Form::label('password','Password: ')}}
                {{Form::password('password',['class'=>'form-control'])}}

                {{Form::label('password_confirmation','Confirm Password: ')}}
                {{Form::password('password_confirmation',['class'=>'form-control'])}}

                {{Form::submit('Register',['class'=>'btn btn-success form-spacing-top '])}}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
