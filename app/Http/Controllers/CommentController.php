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

    public function delete(Request $request, $id)
    {
        // Find the comment by ID
        $comment = Comment::findOrFail($id);

        // Delete the comment
        $comment->delete();

        // Optionally, you can add a success message to flash to the session
        // to indicate that the comment was deleted successfully
        // $request->session()->flash('success', 'Comment deleted successfully.');

        // Redirect back or to a specific route
        return redirect()->back();
    }

    public function editShow($id)
    {
        $comment = Comment::findOrFail($id);

        return view('commentEdit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $comment->content = $validatedData['content'];
        $comment->save();

        return redirect()->route('task.show', ['id' => strval($comment->task->id)]);

    }
}
