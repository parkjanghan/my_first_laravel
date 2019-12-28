@extends('layouts.admin')


@section('content')

    <h1>Categories</h1>

    <div class="col-sm-6">

        <form action="{{ route('categories.store') }}" method="post" class="form-group">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" value="create" class="btn btn-primary">
            </div>
        </form>

    </div>


    <div class="col-sm-6">
        @if($categories)

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>CREATED_AT</th>
                </tr>
            </thead>
            @foreach($categories as $cate)
            <tbody>
                <tr>
                    <td>{{ $cate->id }}</td>
                    <td><a href="{{ route('categories.edit', $cate->id) }}">{{ $cate->name }}</a></td>
                    <td>{{ $cate->created_at ? $cate->created_at->diffForHumans() : 'No date' }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>

        @endif
    </div>

@endsection
