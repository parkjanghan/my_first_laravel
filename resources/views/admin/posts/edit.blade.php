@extends('layouts.admin')


@section('content')

    <h1>Post Edit Page</h1>

    <div class="col-sm-3">
        <img src="{{ $post->photo->file ?? 'http://placehold.it/400x400x' }}" alt="" class="img-responsive rounded">
    </div>

    <div class="col-sm-9">

    <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data" class="form-group">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
        </div>

        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-control">
                <option value="">choose a category</option>
                @foreach($categories as $cate)
                    <option value="{{ $cate->id  }}" {{ $post->category_id == $cate->id ? 'selected' : ''}}>{{ $cate->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="photo_id">Photo:</label>
            <input type="file" name="photo_id">
        </div>

        <div class="form-group">
            <label for="body">Description:</label>
            <textarea name="body" cols="30" rows="10" class="form-control">{{ $post->body }}</textarea>
        </div>


        <div class="form-group">
            <input type="submit" value="update " class="btn btn-primary col-sm-6">
        </div>

    </form>

    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="delete" class="btn btn-danger col-sm-6">
    </form>

    @include('includes.form_error')

    </div>

@endsection
