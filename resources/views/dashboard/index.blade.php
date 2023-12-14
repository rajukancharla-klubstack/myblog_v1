@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Dashboard</h1>

    @auth
    <p class="lead">Welcome, {{ Auth::user()->name }}!</p>
    @endauth

    <h2 class="mt-4">All Posts</h2>

    @forelse($posts as $post)
    <div class="card mb-4">
        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Post Image" style="max-width: 100%; height: auto;">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text"><strong>Author:</strong> {{ $post->user->name }}</p>

            {{-- Display likes count --}}
            <p class="card-text"><strong>Likes:</strong> {{ $post->likes->count() }}</p>

            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <label for="comment_content">Add a Comment:</label>
                            <textarea class="form-control" id="comment_content" name="content" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <form method="post" action="{{ route('likes.store') }}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="btn btn-success">Like</button>
                    </form>
                </div>
            </div>

            {{-- Display comments --}}
            <h4 class="mt-3">Comments</h4>
            @forelse($post->comments as $comment)
            <p class="mb-1">{{ $comment->content }} - <strong>{{ $comment->user->name }}</strong></p>
            @empty
            <p class="mb-1">No comments yet.</p>
            @endforelse
        </div>
    </div>
    @empty
    <p class="lead">No posts found.</p>
    @endforelse
</div>
@endsection