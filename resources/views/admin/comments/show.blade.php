@extends('layouts.admin')


@section('content')

    @if($comments)

        <h1>Comments</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>AUTHOR</th>
                    <th>EMAIL</th>
                    <th>BODY</th>
                </tr>
            </thead>
        @foreach($comments as $comment)
            <tbody>
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->author }}</td>
                <td>{{ $comment->email }}</td>
                <td>{{ $comment->body }}</td>
                <td><a href="{{ route('home.post', $comment->post->id) }}">View Post</a></td>
                <td>
                    @if($comment->is_active == 1)

                        <form action="{{ route('comments.update', $comment->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                <input type="submit" value="Un-approve" class="btn btn-success">
                            </div>
                        </form>

                    @else

                        <form action="{{ route('comments.update', $comment->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                <input type="submit" value="Approve" class="btn btn-primary">
                            </div>
                        </form>

                    @endif
                </td>

                <td>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </div>
                    </form>

                </td>
            </tr>
            </tbody>
        @endforeach
        </table>
        @else

        <h1 class="text-center">No Comments</h1>

    @endif


@endsection
