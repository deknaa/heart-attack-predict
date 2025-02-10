<?php

namespace App\Livewire\Article\Admin;

use App\Models\Article;
use Livewire\Component;

class View extends Component
{
    public function render()
    {
        return view('livewire.article.admin.view', [
            'articles' => Article::with('user')->latest()->get()
        ]);
    }

    public function delete($id)
    {
        Article::findOrFail($id)->delete();
        return back()->with('success', 'Success deleted article');
    }
}
