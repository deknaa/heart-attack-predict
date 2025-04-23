<?php

namespace App\Exports;

use App\Models\Prediction;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class PredictionsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $predictions = Prediction::where('user_id', Auth::id())->latest()->get();
        return $predictions;
    }
}
