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
        return view('user.article.detail', compact('article'));
    }
}
