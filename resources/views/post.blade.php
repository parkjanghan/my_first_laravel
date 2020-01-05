@extends('layouts.blog-post')

@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{ $post->title }}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{ $post->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->updated_at->diffforHumans() }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{ $post->photo->file ?? 'https://placehold.it/900x300' }}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{ $post->body }}</p>

    <hr>

    <p class="bg-primary">{{ session('comment_message') ?? '' }}</p>
    <p class="bg-primary">{{ session('reply_message') ?? '' }}</p>
    <!-- Blog Comments -->

    @if(Auth::check())   {{-- if the user is authenticated or not (logged in)--}}

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        <form role="form" method="POST" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <textarea class="form-control" rows="3" name="body"></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    @endif

    <hr>

    <!-- Posted Comments -->
    @foreach($post->comments as $comment)
    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="{{ $comment->photo ? $comment->photo : 'https://placehold.it/900x300' }}" width="80" height="80">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{ $comment->author }}
                <small>{{ $comment->created_at->diffforHumans() }}</small>
            </h4>
            <p>{{ $comment->body }}</p>

        @if(count($comment->replies))
            @foreach($comment->replies as $reply)
            <div class="media" id="nested-comment">
                <a href="#" class="pull-left">
                    <img class="media-object" src="{{ $reply->photo ? $reply->photo : 'https://placehold.it/900x300' }}" width="80" height="80">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $reply->author }}
                        <small>{{ $reply->created_at->diffforHumans() }}</small>
                    </h4>
                    <p>{{ $reply->body }}</p>
                </div>

                <form action="{{ route('replies.createReply') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="body"></label>
                        <textarea name="body" id="" cols="30" rows="1" class="form-control"></textarea>
                        <input type="hidden" name="comment_id" value="{{ $comment->id}}">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
            @endforeach
        @endif
        </div>
    </div>
    @endforeach

@endsection

@section('side_content')

    <li>{{ $post->category->name }}</li>

@endsection
