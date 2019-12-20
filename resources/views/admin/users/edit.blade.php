@extends('layouts.admin')


@section('content')

    <h1>Edit Users</h1>
    
    <div class="col-sm-3">
        
        <img src="{{ $user->photo->file ?? 'http://placehold.it/400x400x'}}" alt="" class="img-responsive img-rounded">
        
    </div>
    
    
    <div class="col-sm-9">
      
      <form class="form-group" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
          @CSRF
          @method('PATCH')
          
          <label for="name">Name</label>
          <input class="form-control" type="text" name="name" value="{{ $user->name }}">

          <label for="email">Email</label>
          <input class="form-control" type="text" name="email" value="{{ $user->email }}">

          <label for="password">Password</label>
          <input class="form-control" type="password" name="password" value="">

          <label for="role_id">Role</label>
          <select name="role_id" class="form-control">
              <option value="#">Choose a Role</option>
              @foreach($roles as $role)
                  <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : ''}} >{{ $role->name }}</option>
              @endforeach
          </select>

          <label for="is_active">Status</label>
          <select name="is_active" class="form-control">
            
              @if($user->is_active === 0)
                  <option value="0" selected>Not Avtice</option>            
                  <option value="1">Active</option>
              @elseif($user->is_active === 1)
                  <option value="0">Not Avtice</option> 
                  <option value="1" selected>Active</option>
              @endif()            
                  
          </select>

          <label for="photo_id">File</label>
          <input type="file" name="photo_id">

          <input class="btn-primary" type="submit" name="" value="update a user">

      </form>
        
      @include('includes.form_error')

    </div>


@endsection

