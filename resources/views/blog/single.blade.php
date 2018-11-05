@extends('main')
@section('title',"| $post->title")
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
            <p><strong>Posted In:</strong> {{ $post->category->name }}</p>
            <hr>
            <div class="tags">
                <strong>Tags: </strong>
                @foreach ($post->tags as $tag)
                    <a href="#" class="btn btn-sm btn-info">{{ $tag->name }}</a>
                    {{--<div class="d-inline p-2 bg-info text-white">{{ $tag->name }}</div>--}}
                @endforeach
            </div>

        </div>
    </div>

@endsection