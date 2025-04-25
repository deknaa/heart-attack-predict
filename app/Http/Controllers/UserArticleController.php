<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserArticleController extends Controller
{
    public function list()
    {
        $articles = Article::with('user')->latest()->get();
        return view('user.article.show', compact('articles'));
    }

    public function detail(string $slug)
    {
        $article = Article::with('user')->where('slug', $slug)->firstOrFail();

        // popular article
        $popularArticles = Article::with('user')->latest()->take(5)->get();

        // Category article
        $articleCategory = Article::with('user')->where('category', $article->category)->get();

        // total category
        $totalCategory = Article::where('category', $article->category)->count();

        // article terkait
        $relatedArticle = Article::with('user')->where('category', $article->category)->take(3)->get();

        return view('user.article.detail', compact('article', 'popularArticles', 'articleCategory', 'totalCategory', 'relatedArticle'));
    }
}
