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

        return view('prediction.prediction', [
            'time' => $time
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
