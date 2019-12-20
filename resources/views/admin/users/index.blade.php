@extends('layouts.admin')

@section('content')

    <h1>Users</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
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
                    <td>{{ $user->name }}</td>
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
