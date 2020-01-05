@extends('layouts.admin')


@section('content')

    <h1>Media Page</h1>

    @if($photos ?? '')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>CREATED_AT</th>
            </tr>
        </thead>

        <tbody>
        @foreach($photos as $photo)
            <tr>
                <td>{{ $photo->id }}</td>
                <td><img src="{{ $photo->file ?? ''}}" alt="No image" height="100"></td>
                <td>{{ $photo->created_at ?? 'NO DATE'}}</td>
                <td>
                    <form action="{{ route('medias.destroy', $photo->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <input type="submit" value="delete" class="btn btn-danger">
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif

@endsection
