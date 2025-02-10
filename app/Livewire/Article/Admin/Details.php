<?php

namespace App\Livewire\Article\Admin;

use App\Models\Article;
use Livewire\Component;

class Details extends Component
{
    public $article;

    public function mount($slug)
    {
        $this->article = Article::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.article.admin.details');
    }

}
