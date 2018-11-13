@extends('main')
@section('title','| Edit Blog Posts')

@section('stylesheets')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins:'link code'
        });
    </script>

@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method'=>'PUT'])!!}

        {{Form::label('title','Title:')}}
        {{Form::text('title',$post->title,[ "class"=> 'form-control input-lg'])}}

        {{Form::label('slug','Slug:',['class'=>'form-spacing -top'])}}
        {{Form::text('slug',$post->slug,['class'=>'form-control'])}}

        {{Form::label('category_id',"Category: ",["class"=>'form-spacing-top'])}}
        {{Form::select('category_id',$categories,null,['class'=>'form-control'])}}

        {{Form::label('tags',"Tags: ",["class"=>'form-spacing-top'])}}
        {{Form::select('tags[]',$tags,null,['class'=>'form-control js-basic-multiple','multiple'=>'multiple'])}}

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

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-basic-multiple').select2();
        });
    </script>
@endsection