@extends('main')
@section('title','| Create New Post')
@section('stylesheets')
    {!!Html::style('css/parsley.css') !!}
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
        <div class="col-md-8 offset-md-2">
            <h1>Create New Post</h1>
            <hr>
            {{--{!! Form::open(array('route' => 'posts.store')) !!}--}}
            {{--{{Form::label('title',"Title")}}--}}

            {{--{{Form::text('title',null,array('class' => 'form-control'))}}--}}

            {{--{{Form::label('body',"Post your thoughts:")}}--}}
            {{--{{Form::textarea('body',null,array('class'=> 'form-control'))}}--}}
            {{--{{Form::submit('Post',array('class'=>'btn btn-success btn-lg btn-block', 'style' =>'margin-top: 20px;'))}}--}}
            {{--[--}}
            {{--javascript validation--}}
            {!! Form::open(array('route' => 'posts.store','data-parsley-validate'=>'')) !!}
                {{Form::label('title',"Title")}}
              {{--name of the database, value--}}
                {{Form::text('title',null,array('class' => 'form-control','required'=>'','maxlength'=>'250'))}}
            {{--//database name, value, bootstarp class--}}
                 {{ Form::label('slug','Slugs:') }}
                 {{ Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=> '5','maxlength'=>'255')) }}

                {{Form::label('category_id','Category:')}}
                <select class="form-control" name="category_id">

                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                     @endforeach

                </select>
                {{Form::label('tags','Tags:')}}
                <select class="form-control js-basic-multiple" name="tags[]" multiple="multiple">

                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach

                </select>
                {{Form::label('body',"Post your thoughts:")}}
                {{Form::textarea('body',null,array('class'=> 'form-control'))}}
                {{Form::submit('Post',array('class'=>'btn btn-success btn-lg btn-block', 'style' =>'margin-top: 20px;'))}}
            {!! Form::close() !!}
        </div>
    </div>
    @endsection

@section('scripts')
    {!! Html::script('public/js/parsley.min.js') !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-basic-multiple').select2();
        });
    </script>
@endsection

