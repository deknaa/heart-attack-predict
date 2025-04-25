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

        // Total Users
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
        $growthUsers = (($totalUsersThisMonth - $totalUsersLastMonth) / max(1, $totalUsersLastMonth)) * 100;
        $userGrowth = round($growthUsers, 1);

        // Total Articles
        // Hitung jumlah artikel baru bulan ini
        $totalArticlesThisMonth = Article::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();

        // Hitung jumlah artikel baru bulan lalu
        $lastMonth = $now->copy()->subMonth();
        $totalArticlesLastMonth = Article::whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();

        // Hitung persentase perubahan
        $growthArticle = (($totalArticlesThisMonth - $totalArticlesLastMonth) / max(1, $totalArticlesLastMonth)) * 100;
        $articleGrowth = round($growthArticle, 1);

        // Total Announcements
        // Hitung jumlah pengumuman baru bulan ini
        $totalAnnouncementsThisMonth = Announcement::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();  

        // Hitung jumlah pengumuman baru bulan lalu
        $lastMonth = $now->copy()->subMonth();
        $totalAnnouncementsLastMonth = Announcement::whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();

        // Hitung persentase perubahan
        $growthAnnouncement = (($totalAnnouncementsThisMonth - $totalAnnouncementsLastMonth) / max(1, $totalAnnouncementsLastMonth)) * 100;
        $announcementGrowth = round($growthAnnouncement, 1);

        return view('admin.dashboard.dashboard-admin', compact('totalArticlePublished', 'totalUsers', 'totalAnnouncements', 'userGrowth', 'articleGrowth', 'announcementGrowth'));
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
