<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // Display admin dashboard index
    public function index()
    {
        $article = Article::count();
        $users = User::count();

        return view('admin.dashboard.dashboard-admin', compact('article', 'users'));
    }

    // Display list of user on admin dashboard
    public function usersData()
    {
        $users = User::all();

        return view('admin.users.data-user', compact('users'));
    }

    // Display details of a specific user on admin dashboard
    public function usersDetail($id)
    { 
        $user = User::find($id);

        return view('admin.users.detail-user', compact('user'));
    }
}
