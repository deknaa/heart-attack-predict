<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthData extends Model
{
    protected $table = 'health_data';

    protected $fillable = [
        'user_id',
        'weight',
        'is_smoking',
        'is_exercise',
        'total_exercise',
    ];
}
