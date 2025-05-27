<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Prediction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $articleRecommendation = Article::with('user')->latest()->get();

        // Status kesehatan user
        $prediction = Prediction::where('user_id', Auth::id())->latest()->first(); // ambil prediksi terakhir user

        // inisialisasi nilai default jika tidak ada data prediksi
        $cp = $trestbps = $chol = $probability = $age = $input = $displayRecommendations = null;

        $heartDiseaseRecommendations = [
            [
                'icon' => 'fas fa-heartbeat',
                'color' => 'red',
                'title' => '🩺 Konsultasi Rutin ke Dokter Jantung',
                'description' =>
                'Lakukan pemeriksaan rutin untuk memantau kondisi jantung Anda.',
            ],
            [
                'icon' => 'fas fa-dumbbell',
                'color' => 'green',
                'title' => '🏃‍♂️ Rutin Berolahraga Minimal 30 Menit',
                'description' =>
                'Aktivitas fisik teratur membantu memperkuat jantung dan melancarkan peredaran darah.',
            ],
            [
                'icon' => 'fas fa-ban',
                'color' => 'red',
                'title' => '🚭 Berhenti Merokok',
                'description' =>
                'Merokok dapat memperburuk kondisi jantung dan meningkatkan risiko komplikasi.',
            ],
        ];

        $healthyRecommendations = [
            [
                'icon' => 'fas fa-walking',
                'color' => 'green',
                'title' => '🚶‍♂️ Tingkatkan Aktivitas Fisik',
                'description' =>
                'Tambahkan 30 menit jalan cepat setiap hari untuk mengurangi risiko penyakit jantung sebesar 30%.',
            ],
            [
                'icon' => 'fas fa-utensils',
                'color' => 'blue',
                'title' => '🧂 Perhatikan Konsumsi Garam',
                'description' =>
                'Batasi konsumsi garam hingga < 5g per hari untuk membantu mengontrol tekanan darah.',
            ],
            [
                'icon' => 'fas fa-ban',
                'color' => 'red',
                'title' => '🚭 Hindari Merokok',
                'description' =>
                'Merokok meningkatkan risiko serangan jantung sebesar 200-400%.',
            ],
        ];

         if ($prediction) {
            $input = $prediction->input_data;
            $cp = $input['thalach'] ?? null; // detak jantung
            $trestbps = $input['trestbps'] ?? null; // tekanan darah
            $chol = $input['chol'] ?? null; // kolesterol
            $age = $input['age'] ?? null; // usia
            $probability = $prediction->probability ?? null;
            $displayRecommendations = $prediction->prediction_result == 1
                ? $heartDiseaseRecommendations
                : $healthyRecommendations;
        }

        return view('user.dashboard.dashboard-user', compact('articleRecommendation', 'prediction', 'cp', 'trestbps', 'chol', 'age', 'displayRecommendations'));
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
