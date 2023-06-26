<!-- tasks.blade.php -->

@extends('components.layout')

@section('content')
    <div class="container">
        <h1>Task List</h1>

        <div class ="tasks">
            @foreach ($tasks as $task)
                <div class="task-card">
                    <h2><a href="/task/{{$task->id}}">{{ $task->title }}</a></h2>
                    <p><strong>{{ $task->user->name }}</strong></p>
                    <p>{{ $task->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
