@extends('layouts.admin')


@section('content')

    <h1>Post Page</h1>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>USER_ID</th>
            <th>CATEGORY_ID</th>
            <th>PHOTO_ID</th>
            <th>TITLE</th>
            <th>BODY</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>

        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->user_id }}</td>
                    <td>{{ $post->category_id }}</td>
                    <td>{{ $post->photo_id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at->diffForHUmans() }}</td>
                    <td>{{ $post->updated_at->diffForHUmans() }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection
