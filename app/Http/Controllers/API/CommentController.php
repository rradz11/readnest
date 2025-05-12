<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($articleId)
    {
        try {
            $comments = Comment::where('article_id', $articleId)
                ->with(['user' => function ($query) {
                    $query->select('id', 'username');
                }])
                ->get();

            return response()->json($comments, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'error fetching comments: ' . $e->getMessage()], 500);
        }
    }

    public function store(Request $request, $articleId)
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json(['message' => 'unauthorized'], 401);
            }

            $request->validate([
                'content' => 'required|string',
            ]);

            $comment = Comment::create([
                'content' => $request->content,
                'user_id' => $user->id,
                'article_id' => $articleId,
            ]);

            return response()->json($comment, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'error creating comment: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $articleId, $id)
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json(['message' => 'unauthorized'], 401);
            }

            $comment = Comment::find($id);
            if (!$comment) {
                return response()->json(['message' => 'comment not found'], 404);
            }

            if ($comment->user_id !== $user->id && $user->role->name !== 'admin') {
                return response()->json(['message' => 'unauthorized: not comment owner'], 403);
            }

            $request->validate([
                'content' => 'required|string',
            ]);

            $comment->update([
                'content' => $request->content,
            ]);

            return response()->json($comment, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'error updating comment: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($articleId, $id)
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json(['message' => 'unauthorized'], 401);
            }

            $comment = Comment::find($id);
            if (!$comment) {
                return response()->json(['message' => 'comment not found'], 404);
            }

            if ($comment->user_id !== $user->id && $user->role->name !== 'admin') {
                return response()->json(['message' => 'unauthorized: not comment owner'], 403);
            }

            $comment->delete();
            return response()->json(['message' => 'comment deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'error deleting comment: ' . $e->getMessage()], 500);
        }
    }
}
