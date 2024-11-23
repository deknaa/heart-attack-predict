<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PredictionController extends Controller
{
    // method untuk menampilkan halaman prediksi
    public function predictionPage()
    {
        $time = Carbon::now();
        $hour = now()->format('H');

        if($hour >= 5 && $hour < 12) {
            $greeting = 'Good Morning';
        }elseif($hour >= 12 && $hour < 15) {
            $greeting = 'Good Afternoon';
        }elseif($hour >= 15 && $hour < 18){
            $greeting = 'Good Evening';
        }else{
            $greeting = 'Good Night';
        }

        return view('prediction.prediction', [
            'time' => $time,
            'greeting' => $greeting
        ]);
    }

    // method untuk mengirim data ke API
    public function prediction(Request $request)
    {

    }

    // to view history of predict
    public function historyPredict()
    {
        return view('prediction.history');
    }
}
