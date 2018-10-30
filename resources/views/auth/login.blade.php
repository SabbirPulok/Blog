@extends('main')

@section('title','| Login')

@section('content')
    <div class="row">
        <div class ="col-md-6 com-md-offset-3 form-spacing-top">
            {!! Form::open() !!}
                {{ Form::label('email','Email: ') }}
                {{Form::email('email',null,['class' => 'form-control'])}}
                {{Form::label('password','Password: ')}}
                {{Form::password('password',['class' => 'form-control'])}}
                <br>
                {{Form::checkbox('remember')}} {{Form::label('remember','Remember Me')}}
            <br>
                {{Form::submit('Login',['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
           <a href="{{route('password.request')}}" class="btn btn-outbox-primary form-spacing-top">Forgot my password</a>
        </div>
    </div>
@stop