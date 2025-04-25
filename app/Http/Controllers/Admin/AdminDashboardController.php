<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Article;
use App\Models\Prediction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // Tampilkan persentase dalam bentuk line chart
        $chartData = [
            'label' => [
                $lastMonth->format('F Y'),
                $now->format('F Y')
            ],
            'data' => [
                $totalUsersLastMonth,
                $totalUsersThisMonth
            ]
        ];

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

        // ----------------------------
        // 1. Data Bar Chart: Prediksi per Minggu
        // ----------------------------
        $weeklyPredictions = Prediction::select(
            DB::raw('WEEK(created_at, 1) as week'),
            DB::raw('COUNT(*) as total')
        )
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->groupBy(DB::raw('WEEK(created_at, 1)'))
            ->get();

        $barLabels = [];
        $barData = [];

        for ($i = 1; $i <= 5; $i++) {
            $barLabels[] = "Minggu ke-$i";
            $week = $now->copy()->startOfMonth()->addWeeks($i - 1)->week;
            $data = $weeklyPredictions->firstWhere('week', $week);
            $barData[] = $data ? $data->total : 0;
        }

        $barChartData = [
            'labels' => $barLabels,
            'data' => $barData
        ];

        // ----------------------------
        // 2. Data Pie Chart: Risiko vs Tidak Risiko
        // ----------------------------
        $riskData = Prediction::select('prediction_result', DB::raw('COUNT(*) as total'))
            ->groupBy('prediction_result')
            ->get()
            ->pluck('total', 'prediction_result');

        $pieLabels = ['Berisiko', 'Tidak Berisiko'];
        $pieData = [
            $riskData['1'] ?? 0,
            $riskData['0'] ?? 0,
        ];

        $pieChartData = [
            'labels' => $pieLabels,
            'data' => $pieData
        ];

        return view('admin.dashboard.dashboard-admin', compact('totalArticlePublished', 'totalUsers', 'totalAnnouncements', 'userGrowth', 'articleGrowth', 'announcementGrowth', 'chartData', 'barChartData', 'pieChartData', 'riskData'));
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
