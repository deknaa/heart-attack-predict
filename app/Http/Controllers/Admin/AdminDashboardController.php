<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Article;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // Display admin dashboard index
    public function index()
    {
        $totalArticlePublished = Article::count();
        $totalUsers = User::count();
        $totalAnnouncements = Announcement::count();

        $now = Carbon::now();

        // Hitung jumlah user baru bulan ini
        $totalUsersThisMonth = User::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();

        // Hitung jumlah user baru bulan lalu
        $lastMonth = $now->copy()->subMonth();
        $totalUsersLastMonth = User::whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();

        // Hitung persentase perubahan
        $growth = (($totalUsersThisMonth - $totalUsersLastMonth) / max(1, $totalUsersLastMonth)) * 100;
        $userGrowth = round($growth, 1);

        return view('admin.dashboard.dashboard-admin', compact('totalArticlePublished', 'totalUsers', 'totalAnnouncements', 'userGrowth'));
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
