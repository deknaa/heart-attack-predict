<?php

namespace App\Livewire\Article\Admin;

use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    #[Validate]
    public $title = '';
    
    #[Validate]
    public $content = '';

    protected function rules()
    {
        return [
            'title' => 'required|string|max:120|min:5',
            'content' => 'required|string|min:5',
        ];
    }

    public function render()
    {
        return view('livewire.article.admin.create');
    }

    public function save(){

        $validated = $this->validate();
        $validated['user_id'] = Auth::id();
        $validated['slug'] = Str::slug($validated['title']);

        Article::create($validated);
        return redirect()->to('/admin/article/view');
    }
}
