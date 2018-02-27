@extends('layouts.admin')


@section('content')

    <h1>Create Media</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminMediasController@store', 'class' => 'dropzone']) !!}


    {!! Form::close() !!}


    @include('includes.form_error');

@stop