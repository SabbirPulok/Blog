@extends('main')
@section('title','| View posts')
@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>{{ $post->title }}</h1>

        <p class="lead"> {!! $post->body !!}</p>
        <hr>
        <div class="tags">
            @foreach ($post->tags as $tag)
                <a href="#" class="btn btn-sm btn-info">{{ $tag->name }}</a>
                {{--<div class="d-inline p-2 bg-info text-white">{{ $tag->name }}</div>--}}
            @endforeach
        </div>
        <div class="backend-comments" style="margin-top:10px;">
            <h3>Comments  <small>{{ $post->comments()->count() }} total</small></h3>
            <table class="table">
                <thead>
                <tr>
                    <th>Name: </th>
                    <th>Email: </th>
                    <th>Comment: </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($post->comments as $comment)
                        <tr>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->comment}}</td>
                        <td>
                            <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-xs btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{route('comments.delete',$comment->id)}}" class ="btn btn-xs btn-danger"><i class="far fa-trash-alt"></i></a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card btn-h1-spacing">
            <div class="card-body">
                <dl>
                    <dt>Category: </dt>
                    <dd> <p>{{$post->category->name}}</p></dd>
                </dl>
                <dl>
                    <dt>URL: </dt>
                    <dd> <a href="{{ route('blog.single',$post->slug)}}">{{ url('blog/'.$post->slug)}}</a></dd>
                </dl>
                <dl>
                    <dt>Created At: </dt>
                    <dd>{{ date('M j,Y h:i a',strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last updated At: </dt>
                    <dd>{{ date('M j,Y h:i a',strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Delete',['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Html::linkRoute('posts.index','<<See All Posts',[],array('class'=>'btn btn-light btn-block btn-h1-spacing')) !!}
                    </div>
                    <hr>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection