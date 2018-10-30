@extends('main')

@section('title','| Forgot My Password')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card form-spacing-top" style="width:40rem; margin-left:30%">
                <div class="card-header" style="background-color: #007bff ; color:white;">Admin Reset Password</div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                    {!! Form::open(['route'=>['admin.password.email'], 'method' =>'POST' ]) !!}

                     {{Form::label('email','Email Address:')}}
                     {{Form::email('email',null,['class'=>'form-control'])}}
                    <br>
                     {{Form::submit('Reset Password',['class'=>'btn btn-primary'])}}

                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection