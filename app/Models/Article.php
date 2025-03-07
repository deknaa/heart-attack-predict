<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'user_id',
        'featured_image',
        'visibility',
        'category',
    ];

    // Auto generate slug when created new article
    public static function boot()
    {
        parent::boot();
        static::creating(function($article){
            $slug = Str::slug($article->title);
            $count = Article::where('slug', 'like', "$slug%")->count();
            $article->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    // relationship with user
    public function user()
    {
       return $this->belongsTo(User::class, 'user_id'); 
    }

}
