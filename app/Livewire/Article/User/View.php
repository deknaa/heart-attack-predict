<?php

namespace App\Livewire\Article\User;

use App\Models\Article;
use Livewire\Component;

class View extends Component
{
    public function render()
    {
        return view('livewire.article.user.view', [
            'articles' => Article::with('user')->latest()->get()
        ]);
    }
}
