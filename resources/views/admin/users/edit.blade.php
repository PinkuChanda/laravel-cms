@extends('layouts.admin')


@section('content')

	<h1>Edit User</h1>

	<div class="col-sm-3">
		<img src="{{$users->photo ? $users->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
	</div>

	<div class="col-sm-9">
		
		{!! Form::model($users, ['method' => 'PATCH', 'route' => ['users.update', $users->id], 'files' => true]) !!}

		<div class="form-group">
		  {!! Form::label('name', 'Name') !!}
		  {!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
		  {!! Form::label('email', 'Email') !!}
		  {!! Form::email('email', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('role_id', 'User Role') !!}
			{!! Form::select('role_id', ['' => 'Choose Option'] + $roles, null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
		  {!! Form::label('is_active', 'Status') !!}
		  {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active') , null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
		  {!! Form::label('photo_id', 'Users Image') !!}
		  {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
		  {!! Form::label('password', 'Password') !!}
		  {!! Form::password('password', ['class' => 'form-control']) !!}
		</div>

		{!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}

		{!! Form::close() !!}

		<br>

		{!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $users->id]]) !!}

			{!! Form::submit('Delete User', ['class' => 'btn btn-danger']) !!}

		{!! Form::close() !!}

		@include('includes.form_error')

	</div>	

@stop


