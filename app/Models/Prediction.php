<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'input_data', 'prediction_result', 'probability'];

    protected $casts = [
        'input_data' => 'array', // agar data JSON bisa digunakan sebagai array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
