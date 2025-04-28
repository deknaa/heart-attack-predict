<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('user')->latest()->get();
        return view('admin.article.view', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150|min:5',
            'content' => 'required|string|min:5',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'visibility' => 'required|in:public,private',
            'category' => 'required|in:umum,kesehatan_mental,gizi_nutrisi,penyakit,seksual_reproduksi,tips_kesehatan',
        ]);

        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(5),
            'content' => $request->content,
            'user_id' => Auth::id(),
            'featured_image' => $request->hasFile('featured_image') ? $request->file('featured_image')->store('featured_image', 'public') : null,
            'visibility' => $request->visibility,
            'category' => $request->category,
        ]);

        return redirect()->route('article.index')->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug )
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

        return view('admin.article.show', compact('article', 'popularArticles', 'articleCategory', 'totalCategory', 'relatedArticle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $article = Article::with('user')->where('slug', $slug)->firstOrFail();
        return view('admin.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate([
            'title' => 'required|string|max:150|min:5',
            'content' => 'required|string|min:5',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'visibility' => 'required|in:public,private',
            'category' => 'required|in:umum,kesehatan_mental,gizi_nutrisi,penyakit,seksual_reproduksi,tips_kesehatan',
        ]);

        $article = Article::where('slug', $slug)->firstOrFail();
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'featured_image' => $request->hasFile('featured_image') ? $request->file('featured_image')->store('featured_image', 'public') : $article->featured_image,
            'visibility' => $request->visibility,
            'category' => $request->category,
        ]);

        return redirect()->route('article.index')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')->with('success', 'Article deleted successfully');
    }
}
