@extends('layouts.admin')


@section('content')

    <h1>Create Users</h1>

    <form class="form-group" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @CSRF

        <label for="name">Name</label>
        <input class="form-control" type="text" name="name">

        <label for="email">Email</label>
        <input class="form-control" type="text" name="email">

        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" >

        <label for="role_id">Role</label>
        <select name="role_id" class="form-control">
            <option value="#" selected>Choose a Role</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>

        <label for="is_active">Status</label>
        <select name="is_active" class="form-control">
            <option value="0" selected>Not Avtice</option>
            <option value="1">Active</option>
        </select>

        <label for="photo_id">File</label>
        <input type="file" name="photo_id">

        <input class="btn-primary" type="submit" name="" value="create a user">

    </form>
      
    @include('includes.form_error')

@endsection

