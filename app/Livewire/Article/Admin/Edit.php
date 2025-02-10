<?php

namespace App\Livewire\Article\Admin;

use Livewire\Attributes\Validate;
use App\Models\Article;
use Livewire\Component;

class Edit extends Component
{
    #[Validate]
    public $article, $title, $content;

    protected function rules()
    {
        return [
            'title' => 'nullable|string|min:5|max:120',
            'content' => 'nullable|string|min:5',
        ];
    }

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->title = $article->title;
        $this->content = $article->content;
    }

    public function render()
    {
        return view('livewire.article.admin.edit');
    }

    public function save()
    {
        $validated = $this->validate();
        $validated['slug'] = '';

        $this->article->update($validated);
        return redirect()->route('admin.article.view')->with('success', 'Success edited an article');
    }
}
