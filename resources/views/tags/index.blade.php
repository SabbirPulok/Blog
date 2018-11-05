@extends('main')
@section('title','| All Tags')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <caption><h1>Tags</h1></caption>
            <hr>
            <table class="table">

                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)

                    <tr>
                        <th scope="row">{{ $tag->id }}</th>

                        <td><a href="{{route('tags.show',$tag->id)}}">{{ $tag->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--for pagination--}}
            {{--<div class="text-center float">--}}
            {{--{!! $categories->links(); !!}--}}
            {{--</div>--}}
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <div class="card btn-h1-spacing">
                <div class="card-body">
                    {!! Form::open(['route'=>'tags.store','method'=>'POST']) !!}
                    <h2>New Tag</h2>
                    {{Form::label('name',"Tag Name:")}}
                    {{Form::text('name',null,['class'=>'form-control'])}}
                    {{Form::submit('Create New Tag',['class' => 'btn btn-primary btn-block btn-h1-spacing'])}}

                </div>
            </div>
        </div>
    </div>
@endsection