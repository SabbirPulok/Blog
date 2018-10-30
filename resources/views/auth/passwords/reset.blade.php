@extends('main')

@section('title','| Forgot My Password')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card form-spacing-top" style="width:40rem; margin-left:30%">
                <div class="card-header" style="background-color: #007bff ; color:white;">Reset Password</div>
                <div class="card-body">
                    {!! Form::open(['url'=>['password/reset'], 'method' =>"POST" ]) !!}

                    {{Form::hidden('token',$token)}}

                    {{Form::label('email','Email Address:')}}
                    {{Form::email('email',$email,['class'=>'form-control'])}}

                    {{Form::label('password',"New Password: ")}}
                    {{Form::password('password',['class'=>'form-control'])}}

                    {{Form::label('password_confirmation','Confirm New Password: ')}}
                    {{Form::password('password_confirmation',['class'=>'form-control'])}}

                    <br>
                    {{Form::submit('Reset Password',['class'=>'btn btn-primary'])}}

                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>

@endsection