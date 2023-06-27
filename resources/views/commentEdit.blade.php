@props(['comment'])
@extends('components.layout')
@section('content')
    <form method="POST" class="comment-card" action="{{ route('comment.update', ['id' => $comment->id]) }}">
        @csrf
        @method('PUT') <!-- Add the PUT method spoofing -->

        <p><strong>{{ $comment->user->name }}</strong></p>
        <textarea name="content" rows="3">{{ $comment->content }}</textarea> <!-- Input field for editing the comment content -->
        <div class="buttons">
            <button type="submit" class="btn-update">Update</button> <!-- Change the button text to "Update" -->
            <a href="/task/{{$comment->task->id}}" class="btn-cancel">Cancel</a> <!-- Add a "Cancel" link -->
        </div>
    </form>

@endsection
