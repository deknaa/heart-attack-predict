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
        return view('user.dashboard.dashboard-user');
    }

    public function getUserPredictions()
    {
        $userId = Auth::id(); // Ambil ID user yang sedang login
        $predictions = Prediction::where('user_id', $userId)
            ->orderBy('created_at', 'asc')
            ->get(['created_at', 'probability']);

        return response()->json($predictions);
    }
}
