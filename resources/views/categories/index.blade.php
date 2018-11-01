@extends('main')
@section('title','| All Categories')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <caption><h1>Categories</h1></caption>
            <hr>
            <table class="table">

                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)

                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
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
                    {!! Form::open(['route'=>'categories.store','method'=>'POST']) !!}
                    <h2>New Category</h2>
                        {{Form::label('name',"Category Name:")}}
                        {{Form::text('name',null,['class'=>'form-control'])}}
                        {{Form::submit('Create New Category',['class' => 'btn btn-primary btn-block btn-h1-spacing'])}}

                </div>
            </div>
        </div>
    </div>
@endsection