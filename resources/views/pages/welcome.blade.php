@extends('main')
@section('title','| Homepage')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="styles.css">
@endsection

@section('content')
    {{--header row--}}
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Welcome to my,Blog!</h1>
                <p class="lead">Thank you for visiting my blog. Please read my latest posts.</p>
                <hr class="my-4">
                <p>Hope you will enjoy my blog.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Popular Posts</a>
            </div>
        </div>
    </div>
    {{--end header row--}}
    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="post">
                <h3>{{ $post->title }}</h3>
                <p>{{ substr( $post->body,0,300) }} {{strlen($post->body)>300?"...":""}}</p>
                <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
            </div>
            <hr>
            @endforeach
        </div>
        <div class="col-md-3 col-md-offset-1">
            <h2>Sidebar</h2>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        // confirm('I loaded up some js');
    </script>
@endsection