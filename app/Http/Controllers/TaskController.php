<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Routing\Controller;

class TaskController extends Controller
{
    public function index(){
        return view('tasks', [
            'tasks' => Task::all()
        ]);
    }

    public function indexAPI(){
        $tasks = Task::all();

        return response()->json($tasks);
    }

    public function show($id){
        return view('task', [
            'task' => Task::find($id)
        ]);
    }
}
