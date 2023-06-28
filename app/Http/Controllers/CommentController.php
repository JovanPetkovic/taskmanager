<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\User;
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

        $validityError = $this->checkValidity($id,$request->bearerToken());
        if($validityError){
            return $validityError;
        }
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

    public function getAPI($id){
        $comment = Comment::find($id);
        if(!$comment){
            return response()->json([
                'message' => 'Comment not found'
            ]);
        }
        $content = $comment->content;
        $userName = $comment->user->name;
        $taskTitle = $comment->task->title;

        return response()->json([
            'content' => $content,
            'username' => $userName,
            'taskTitle' => $taskTitle,
        ]);
    }

    public function updateAPI(Request $request, $id){
        $request->validate([
            'content' => 'required|string'
        ]);

        $apiToken = $request->bearerToken();
        if (!$apiToken) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $validityError = $this->checkValidity($id,$request->bearerToken());
        if($validityError){
            return $validityError;
        }

        $comment = Comment::find($id);
        $comment->content = $request->input('content');

        if(!$comment->save()){
            return response()->json([
                'message' => 'Saving comment failed',
                //'commentContent' => $comment->content,
            ]);
        }
        else{
            return response()->json([
                'message' => 'Comment updated successfully',
                //'commentContent' => $comment->content,
            ]);
        }
    }

    public function addAPI(Request $request){
        $request->validate([
            'content' => 'required|string',
            'task_id' => 'required|integer',
        ]);
        $apiToken = $request->bearerToken();

        if (!$apiToken) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $user = User::where('api_token', $apiToken)->first();
        if (!$user) {
            return response()->json(['message' => 'Invalid API token'], 401);
        }

        $comment = new Comment();

        $comment->content = $request->input('content');
        $comment->task_id = $request->input('task_id');
        $comment->user_id = $user->id;

        if(!$comment->save()){
            return response()->json([
                'message' => 'Saving comment failed',
                'comment' => $comment,
            ]);
        }
        else{
            return response()->json([
                'message' => 'Comment created successfully',
                'comment' => $comment,
            ]);
        }

    }

    private function checkValidity($id,$apiToken){
        $comment = Comment::find($id);
        $user = User::where('api_token', $apiToken)->first();

        if (!$comment) {
            return response()->json(['error' => 'Comment not found'], 401);
        }

        if (!$user) {
            return response()->json(['error' => 'Invalid API token'], 401);
        }

        if ($user->id!=$comment->user->id) {
            return response()->json(['error' => 'You are not the author of the comment'], 401);
        }
    }

}
