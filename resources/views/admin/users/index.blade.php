
@extends('layouts.admin')


@section('content')


    <h1>Users</h1>

    @if(Session::has('delete_user'))

        <div class="alert alert-danger">
            {{session('delete_user')}}
        </div>

    @endif

    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
        	@if($users)

          @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td><img height="30px" width="50px" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded"></td>
            <td><a href="{{ route('users.edit',$user->id) }}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
          </tr>
          @endforeach
         @endif
        </tbody>
      </table>


@stop