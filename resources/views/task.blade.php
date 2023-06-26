<!-- Task Details -->

@extends('components.layout')


@section('content')
    <div class="task-big">
        <h2>Task Details</h2>
        <p>Title: {{ $task->title }}</p>
        <p>Author: {{$task->user->name}}</p>
        <p>Description: {{ $task->description }}</p>

        <!-- Comments -->
        <h2>Comments</h2>
        @if ($task->comments->count() > 0)
            <div class="comments">
                @foreach ($task->comments as $comment)
                    <x-comment :comment="$comment"/>
                @endforeach
            </div>
        @else
            <p>No comments found.</p>
        @endif

        <!-- Add Comment Form -->
        @if(auth()->check())
        <h2>Add Comment</h2>
        <form action="/comment" method="POST">
            @csrf
            <input type="hidden" name="task_id" value="{{ $task->id }}">
            <textarea name="content" placeholder="Enter your comment"></textarea>
            <button type="submit">Submit</button>
        </form>
        @endif
    </div>
@endsection
