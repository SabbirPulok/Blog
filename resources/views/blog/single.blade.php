@extends('main')
@section('title',"| $post->title")
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>
            <hr>
            <div class="tags">
                <strong>Tags: </strong>
                @foreach ($post->tags as $tag)
                    <a href="#" class="btn btn-sm btn-info">{{ $tag->name }}</a>
                    {{--<div class="d-inline p-2 bg-info text-white">{{ $tag->name }}</div>--}}
                @endforeach
            </div>
            <hr>
            <p><strong>Posted In:</strong> {{ $post->category->name }}</p>

        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8 cool-md-offset-2">
            <h3 class="comment-title"><span class="fas fa-comment-alt"></span> {{$post->comments->count()}} {{count($post->comments)>0?"Comments":"Comment"}}</h3>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=50&d=mm"  }}" class="author-image">
                        <div class="author-name">
                            <h4>{{ $comment->name }}</h4>

                            <p class="author-time">{{$comment->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                    <div class="comment-content">
                        {{$comment->comment}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
            {{ Form::open(['route'=>['comments.store', $post->id],'method'=>'POST']) }}
            <div class="row">
                <div class="col-md-6">
                    {{Form::label('name','Name: ')}}
                    {{Form::text('name',null,['class'=>'form-control'])}}
                </div>

                    <div class="col-md-6">
                        {{Form::label('email','Email: ')}}
                        {{Form::text('email',null,['class'=>'form-control'])}}
                    </div>

                <div class="col-md-12">
                    {{Form::label('comment',"Comment: ")}}
                    {{Form::textarea('comment',null,['class'=>"form-control",'rows' =>'5'])}}
                    {{Form::submit('Add Comment',['class'=>'btn btn-primary btn-block','style'=>'margin-top:20px'])}}
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>

@endsection