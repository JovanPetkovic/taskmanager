<!-- tasks.blade.php -->

@extends('components.layout')

@section('content')
{{--    <div class="container">--}}
{{--        <h1>Task List</h1>--}}

{{--        <div class ="tasks">--}}
{{--            @foreach ($tasks as $task)--}}
{{--                <div class="task-card">--}}
{{--                    <h2><a href="/task/{{$task->id}}">{{ $task->title }}</a></h2>--}}
{{--                    <p><strong>{{ $task->user->name }}</strong></p>--}}
{{--                    <p>{{ $task->description }}</p>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="container">
        <h1>Task List</h1>

        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($tasks as $task)
                <div class="col mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/task/{{$task->id}}">{{ $task->title }}</a></h5>
                            <p class="card-text"><strong>{{ $task->user->name }}</strong></p>
                            <p class="card-text">{{ $task->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
