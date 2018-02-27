
@extends('layouts.admin')


@section('content')


    <h1>Media</h1>


    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>
        @if($photos)

            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="30px" width="50px" src="{{$photo->file}}" alt="" class="img-responsive img-rounded"></td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['medias.destroy', $photo->id]]) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>


@stop