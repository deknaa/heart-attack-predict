<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public function render()
    {
        $article = Article::count();
        return view('livewire.dashboard-admin', compact('article'));
    }
}
