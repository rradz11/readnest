<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['author.user', 'category'])->get();
        return response()->json($articles, 200);
    }

    public function show($id)
    {
        $article = Article::with(['author.user', 'category'])->find($id);
        if (!$article) {
            return response()->json(['message' => 'Article not found'], 404);
        }
        return response()->json($article, 200);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if (!in_array($user->role->name, ['admin', 'writer'])) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published,archived',
        ]);

        $author = $user->author;
        if (!$author) {
            return response()->json(['message' => 'User is not an author'], 403);
        }

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => $author->id,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'published_at' => $request->status === 'published' ? now() : null,
        ]);

        return response()->json($article, 201);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if (!in_array($user->role->name, ['admin', 'writer'])) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $article = Article::find($id);
        if (!$article) {
            return response()->json(['message' => 'Article not found'], 404);
        }

        if ($user->role->name !== 'admin' && $article->author->user_id !== $user->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published,archived',
        ]);

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'published_at' => $request->status === 'published' ? now() : $article->published_at,
        ]);

        return response()->json($article, 200);
    }

    public function destroy($id)
    {
        $user = Auth::user();
        if (!in_array($user->role->name, ['admin', 'writer'])) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $article = Article::find($id);
        if (!$article) {
            return response()->json(['message' => 'Article not found'], 404);
        }

        if ($user->role->name !== 'admin' && $article->author->user_id !== $user->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $article->delete();
        return response()->json(['message' => 'Article deleted'], 200);
    }
}
