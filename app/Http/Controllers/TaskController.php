<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class TaskController extends Controller
{
    public function index(){
        if(auth()->check()) {
            return view('tasks', [
                'tasks' => Task::all()
            ]);
        }
        else{
            return view('login');
        }
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

    public function addAPI(Request $request){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        $apiToken = $request->bearerToken();

        if (!$apiToken) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user = User::where('api_token', $apiToken)->first();
        if (!$user) {
            return response()->json(['error' => 'Invalid API token'], 401);
        }

        $task = new Task();

        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->user_id = $user->id;

        if(!$task->save()){
            return response()->json([
                'message' => 'Saving task failed',
                //'task' => $task,
            ]);
        }
        else{
            return response()->json([
                'message' => 'Task created successfully',
                //'task' => $task,
            ]);
        }

    }

    public function deleteAPI(Request $request, $id)
    {

        $apiToken = $request->bearerToken();
        $task = Task::find($id);
        $user = User::where('api_token', $apiToken)->first();

        if (!$task) {
            return response()->json(['error' => 'Task not found.'], Response::HTTP_NOT_FOUND);
        }

        if (!$user) {
            return response()->json(['error' => 'Invalid API token'], 401);
        }

        if ($user->id!=$task->user->id) {
            return response()->json(['error' => 'You are not the author of the task'], 401);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully.'], Response::HTTP_OK);
    }

}
