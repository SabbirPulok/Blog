@extends('main')
@section('title','| Edit Blog Posts')
@section('content')
<div class="row">
    <div class="col-md-8">
    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method'=>'PUT'])!!}

        {{Form::label('title','Title:')}}
        {{Form::text('title',$post->title,[ "class"=> 'form-control input-lg'])}}

        {{Form::label('slug','Slug:',['class'=>'form-spacing -top'])}}
        {{Form::text('slug',$post->slug,['class'=>'form-control'])}}

        {{Form::label('body','Body:',["class"=>'form-spacing-top'])}}
        {{Form::textarea('body',$post->body,["class"=> 'form-control'])}}
    </div>
    <div class="col-md-4">
        <div class="card btn-h1-spacing">
            <div class="card-body">
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
                        {!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{Form::submit('Save Changes',['class'=>'btn btn-success btn-block'])}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close()!!}
</div>
@endsection