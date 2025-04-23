<?php

namespace App\Http\Controllers;

use App\Models\Prediction;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PredictionController extends Controller
{
    // method untuk menampilkan halaman prediksi
    public function index()
    {   
        $latestPrediction = auth()->user()->predictions()->latest()->first();
        $inputData = $latestPrediction ? $latestPrediction->input_data : [];

        return view('prediction.index', compact('inputData'));
    }

    public function predict(Request $request)
    {
        $client = new Client();

        try {
            $response = $client->post('http://127.0.0.1:5000/predict', [
                'json' => $request->except('_token'),
            ]);

            $data = json_decode($response->getBody(), true);

            // Simpan hasil prediksi ke database
            Prediction::create([
                'user_id' => Auth::id(),
                'input_data' => $request->except('_token'),
                'prediction_result' => $data['prediction'] ?? 'Unknown',
                'probability' => $data['probability'] ?? 'Unknown'
            ]);

            return view('prediction.index', ['result' => $data]);
        }catch(\Exception $e){
            return back()->with('error', 'Gagal mendapatkan hasil prediksi, kemungkinan masalah pada API');
        }
    }

    // to view history of predict
    public function history()
    {
        $predictions = Prediction::where('user_id', Auth::id())->latest()->get();
        return view('prediction.history', compact('predictions'));
    }

    public function show($id): JsonResponse
    {
        // Cari prediksi berdasarkan ID
        $prediction = Prediction::findOrFail($id);
        
        // Format tanggal agar sesuai dengan yang ditampilkan di frontend
        $formattedDate = $prediction->created_at->format('d M Y, H:i');
        
        // response data
        $responseData = [
            'id' => $prediction->id,
            'created_at' => $formattedDate,
            'prediction_result' => $prediction->prediction_result,
            'probability' => $prediction->probability,
            'input_data' => $prediction->input_data,
        ];
        
        return response()->json($responseData);
    }
}
