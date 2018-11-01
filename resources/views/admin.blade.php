@extends('main')
@section('title','| All Posts')
@section('content')
    <div class='row'>
        <div class="col-md-12">
            <h1>All Posts</h1>
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
                        <td>{{ substr($post->body,0,50) }}{{strlen($post->body)>50?"...":""}}</td>
                        <td>{{ date('M j, Y',strtotime($post->created_at)) }}</td>

                        <td>
                            <div class="row">
                                <div class="col-sm-6">
                                     <a href="{{route('admin.show',$post->id)}}" class="btn btn-info btn-block">View</a>
                                </div>
                                <div class="col-sm-6">
                                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

                                    {!! Form::submit('Delete',['class' => 'btn btn-danger btn-block']) !!}

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </td>
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
