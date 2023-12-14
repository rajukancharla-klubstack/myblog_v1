@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Comment</h1>

    <form method="post" action="{{ route('comments.store') }}">
        @csrf
        <div class="form-group">
            <label for="content">Comment:</label>
            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
        </div>
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>
</div>
@endsection