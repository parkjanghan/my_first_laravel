@extends('layouts.admin')


@section('content')

    <h1>Post Create Page</h1>

    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="form-group">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-control">
                <option value="">choose a category</option>
                @foreach($categories as $cate)
                    <option value="{{ $cate->id  }}">{{ $cate->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="photo_id">Photo:</label>
            <input type="file" name="photo_id">
        </div>

        <div class="form-group">
            <label for="body">Description:</label>
            <textarea name="body" cols="30" rows="10" class="form-control"></textarea>
        </div>


        <div class="form-group">
            <input type="submit" value="create" class="btn btn-primary">
        </div>

    </form>

    @include('includes.form_error')

@endsection
