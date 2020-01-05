@extends('layouts.admin')

@section('content')

    @if(Session::has('create_user'))

      <p class="bg-success">{{ session('create_user')}}</p>

    @elseif(Session::has('update_user'))

      <p class="bg-primary">{{ session('update_user')}}</p>

    @elseif(Session::has('delete_user'))

      <p class="bg-danger">{{ session('delete_user')}}</p>

    @endif

    <h1>Users</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>PHOTO</th>
                <th>NAME</th>
                <th>E-MAIL</th>
                <th>ROLE</th>
                <th>is_active</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>

        <tbody>
        @if($users)
            @foreach($users as $user)

                <tr>
                    <td>{{ $user->id }}</td>
                    <td> <img height="50" src="{{ $user->photo->file ?? 'https://placehold.it/150x150' }}" alt=""> </td>
                    <td> <a href="{{ route('users.edit', $user->id) }}"> {{ $user->name }} </a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->is_active == 1 ? 'Active' : 'Not actived' }}</td>
                    <td>{{ $user->created_at->diffForHUmans() }}</td>
                    <td>{{ $user->updated_at->diffForHUmans() }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection()
