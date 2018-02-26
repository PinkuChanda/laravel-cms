@extends('layouts.admin')


@section('content')

    <h1>Categories</h1>

    @if(Session::has('alert_categories'))

        <div class="alert alert-danger">
            {{session('alert_categories')}}
        </div>

    @endif

    <div style="padding-top: 10px;" class="col-sm-6">
        {!! Form::model($categories, ['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $categories->id], 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Category']) !!}
        </div>

        {!! Form::submit('Update Category', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

        <br>

        {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $categories->id]]) !!}

        {!! Form::submit('Delete Category', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}

        @include('includes.form_error')
    </div>


    <div class="col-sm-6">

    </div>

@stop