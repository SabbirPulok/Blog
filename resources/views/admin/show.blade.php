@extends('main')
@section('title','| Admin posts')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead"> {{ $post->body }}</p>
        </div>
        <div class="col-md-4">
            <div class="card btn-h1-spacing">
                <div class="card-body">
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
                        <div class="col-sm-12">
                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

                            {!! Form::submit('Delete',['class' => 'btn btn-danger btn-block']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Html::linkRoute('admin.dashboard','<<See All Posts',[],array('class'=>'btn btn-light btn-block btn-h1-spacing')) !!}
                        </div>
                        <hr>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection