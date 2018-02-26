@extends('layouts.admin')


@section('content')

    <h1>Categories</h1>

    @if(Session::has('alert_categories'))

        <div class="alert alert-danger">
            {{session('alert_categories')}}
        </div>

    @endif

    <div style="padding-top: 10px;" class="col-sm-5">
        {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Category']) !!}
        </div>

        {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

        @include('includes.form_error')
    </div>

    <div class="col-sm-1"> </div>

    <div class="col-sm-6">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)

                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No date'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@stop