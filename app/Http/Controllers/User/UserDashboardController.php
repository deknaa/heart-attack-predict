<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Prediction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $activitesRecommendation = Prediction::where('user_id', Auth::id())->latest()->get();

        return view('user.dashboard.dashboard-user', compact('activitesRecommendation'));
    }

    public function getUserPredictions()
    {
        $userId = Auth::id(); // Ambil ID user yang sedang login
        $predictions = Prediction::where('user_id', $userId)
            ->orderBy('created_at', 'asc')
            ->get(['created_at', 'probability']);

        return response()->json($predictions);
    }

    public function getLatestRiskAssessment()
    {
        $userId = Auth::id();

        // Ambil data prediksi terbaru dari user yang sedang login
        $latestPrediction = Prediction::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$latestPrediction) {
            return response()->json(['probability' => 0]); // Default jika belum ada data
        }

        return response()->json([
            'probability' => $latestPrediction->probability * 100 // Ubah ke persen
        ]);
    }
}
