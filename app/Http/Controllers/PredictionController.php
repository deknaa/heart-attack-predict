<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PredictionController extends Controller
{
    // method untuk menampilkan halaman prediksi
    public function predictionPage()
    {
        return view('prediction.prediction');
    }

    // method untuk mengirim data ke API
    public function prediction(Request $request)
    {

    }
}
