@extends('layouts.admin')


@section('content')

    <h1>Create Posts</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}

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

    {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}


    @include('includes.form_error');

@stop