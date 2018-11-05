@extends('main')
@section('title',"| $tag->name Tag")

@section('content')
    <div class="row">

        <div class="col-md-8">
            <hr>
            <h1>{{ $tag->name }} Tag
                <small>
                    @if($tag->post()->count() == 0 || $tag->post()->count()== 1)
                        {{ $tag->post()->count()}} Post
                     @else
                        {{$tag->post()->count()}} Posts
                        @endif

                </small>
            </h1>
        </div>
        <div class="col-md-2">
            <hr>
            <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-lg btn-primary btn-block float-right">Edit</a>
        </div>
        <div class="col-md-2">
            <hr>
            {{Form::open(['route'=>['tags.destroy',$tag->id],'method'=> 'DELETE'])}}
                {{Form::submit('Delete',['class'=>'btn btn-lg btn-danger btn-block'])}}
            {{Form::close()}}
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tag->post as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td> {{ $post->title }}</td>
                    <td>
                        @foreach($post->tags as $tag)
                            <span class="badge badge-secondary">{{$tag->name }}</span>
                        @endforeach
                    </td>
                    <td><a href="{{route('posts.show',$post->id)}}"class="btn btn-outline-info btn-sm">View</a> </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection