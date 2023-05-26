<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanDrone extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'date_time',
        'area',
        'density',
        'user_id',
        'location_id',
    ];
}
