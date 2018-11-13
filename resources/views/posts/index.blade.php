@extends('main')
@section('title','| All Posts')
@section('content')
   <div class='row'>
       <div class="col-md-10">
           <h1>All Posts</h1>
       </div>
       <div class="col-md-2">
           <a href="{{ route('posts.create') }}" class="btn btn-lg btn-primary btn-h1-spacing">Create New Post</a>
       </div>
       <div class="col-md-12">
           <hr>
       </div>
   </div>
    {{--end of a row--}}
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Created At</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)

                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ substr(strip_tags($post->body),0,50) }}{{strlen(strip_tags($post->body))>50?"...":""}}</td>
                    <td>{{ date('M j, Y',strtotime($post->created_at)) }}</td>
                    <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-info btn-sm">View</a><a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning btn-sm">Edit</a></td>
                </tr>
                 @endforeach
                </tbody>
            </table>
            {{--for pagination--}}
            <div class="text-center float">
                {!! $posts->links(); !!}
            </div>
        </div>
    </div>


@endsection
