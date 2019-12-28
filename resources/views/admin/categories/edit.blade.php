@extends('layouts.admin')


@section('content')

    <h1>Edit Categories</h1>

    <div class="col-sm-6">

        <form action="{{ route('categories.update', $cate->id) }}" method="post" class="form-group">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $cate->name }}">
            </div>

            <div class="form-group">
                <input type="submit" value="update" class="form-control btn btn-primary">
            </div>
        </form>

        <form action="{{ route('categories.destroy', $cate->id) }}" method="post" class="form-group">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <input type="submit" value="delete" class="form-control btn btn-danger">
            </div>
        </form>

    </div>

@endsection
