<!-- Task Details -->

@extends('components.layout')


@section('content')
{{--    <div class="task-big">--}}
{{--        <h2>Task Details</h2>--}}
{{--        <p>Title: {{ $task->title }}</p>--}}
{{--        <p>Author: {{$task->user->name}}</p>--}}
{{--        <p>Description: {{ $task->description }}</p>--}}

{{--        <!-- Comments -->--}}
{{--        <h2>Comments</h2>--}}
{{--        @if ($task->comments->count() > 0)--}}
{{--            <div class="comments">--}}
{{--                @foreach ($task->comments as $comment)--}}
{{--                    <x-comment :comment="$comment"/>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        @else--}}
{{--            <p>No comments found.</p>--}}
{{--        @endif--}}

{{--        <!-- Add Comment Form -->--}}
{{--        @if(auth()->check())--}}
{{--        <h2>Add Comment</h2>--}}
{{--        <form action="/comment" method="POST">--}}
{{--            @csrf--}}
{{--            <input type="hidden" name="task_id" value="{{ $task->id }}">--}}
{{--            <textarea name="content" placeholder="Enter your comment"></textarea>--}}
{{--            <button type="submit">Submit</button>--}}
{{--        </form>--}}
{{--        @endif--}}
{{--    </div>--}}
<style>
    .section {
        margin-bottom: 30px;
    }

    .comment-line {
        border-top: 1px solid lightgray;
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>

<div class="container">
    <div class="task-big">
        <div class="section">
            <h2>Task Details</h2>
            <div class="card">
                <div class="card-body">
                    <p class="card-text"><strong>Title:</strong> {{ $task->title }}</p>
                    <p class="card-text"><strong>Author:</strong> {{$task->user->name}}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $task->description }}</p>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Comments</h2>
            <div class="card">
                <div class="card-body">
                    @if ($task->comments->count() > 0)
                        <div class="comments">
                            @foreach ($task->comments as $comment)
                                <x-comment :comment="$comment"/>
                                <hr class="comment-line">
                            @endforeach
                        </div>
                    @else
                        <p class="card-text">No comments found.</p>
                    @endif
                </div>
            </div>
        </div>

        @if(auth()->check())
            <div class="section">
                <h2>Add Comment</h2>
                <form action="/comment" method="POST" class="w-75">
                    @csrf
                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="content" placeholder="Enter your comment" style="resize: none"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        @endif
    </div>
</div>


@endsection
