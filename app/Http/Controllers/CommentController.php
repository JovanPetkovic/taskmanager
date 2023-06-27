<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    public function deleteAPI(Request $request, $id)
    {
//        if (!$request->user()->can('delete-comment')) {
//            return response()->json(['error' => 'Unauthorized.'], Response::HTTP_UNAUTHORIZED);
//        }

        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['error' => 'Comment not found.'], Response::HTTP_NOT_FOUND);
        }

        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully.'], Response::HTTP_OK);
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

    public function getCommentAPI($id){
        $comment = Comment::find($id);
        if(!$comment){
            return response()->json([
                'message' => 'Comment not found'
            ]);
        }
        $content = $comment->content;
        $userName = $comment->user->name;

        return response()->json([
            'content' => $content,
            'username' => $userName,
        ]);
    }
}
