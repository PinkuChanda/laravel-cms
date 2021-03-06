@extends('layouts.admin')



@section('content')

    @if(Session::has('alert_comment'))

        <div class="alert alert-danger">
            {{session('alert_comment')}}
        </div>

    @endif

    @if(count($comments) > 0)

        <h1>Comments</h1>


    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Comment</th>
        </tr>
        </thead>
        <tbody>

            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{route('home.post', $comment->post->id )}}">View Post</a></td>
                    <td>
                        @if($comment->is_active == 1)

                            {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            {!! Form::submit('Un-approve', ['class' => 'btn btn-success']) !!}

                            {!! Form::close() !!}

                            @else

                            {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            {!! Form::submit('Approve', ['class' => 'btn btn-info']) !!}

                            {!! Form::close() !!}

                        @endif

                    </td>

                    <td>
                        {!! Form::open(['method' => 'DELETE', 'action' => ['PostCommentsController@destroy', $comment->id]]) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @else

        <h1>No Comments</h1>


    @endif




@stop