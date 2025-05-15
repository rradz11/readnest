<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlePageController extends Controller
{
    public function index()
    {
        $articles = Article::with(['author.user', 'category'])->get();
        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::with(['author.user', 'category'])->findOrFail($id);
        return view('articles.show', compact('article'));
    }
}
