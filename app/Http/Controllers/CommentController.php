<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommentController extends Controller
{
    public function index(){

    }

    public function addComment(Request $request){
        $request->validate([
            'content' => 'required|string',
            'task_id' => 'required|exists:tasks,id',
        ]);

        // Create a new comment
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->task_id = $request->input('task_id');
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return redirect()->back()->with('success', 'Comment created successfully.');
    }

}
