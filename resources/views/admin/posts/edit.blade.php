@extends('layouts.admin')


@section('content')

    <h1>Create Posts</h1>

    <div class="col-sm-3">
        <img src="{{$posts->photo ? $posts->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="col-sm-9">

    {!! Form::model($posts, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $posts->id], 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'exampleInputEmail1', 'placeholder' => 'Enter Title']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category') !!}
        {!! Form::select('category_id', ['' => 'Choose Option'] + $category, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Users Image') !!}
        {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Body') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control','rows' => 3, 'cols' => 6]) !!}
    </div>

    {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

        <br>

        {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $posts->id]]) !!}

        {!! Form::submit('Delete Post', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}

        @include('includes.form_error')

    </div>


@stop