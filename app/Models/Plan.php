<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'date_time',
        'area',
        'density',
        'user_id', 
        'location_id',
        'drone_id'
    ];
    public static function store($request, $id = null){
        $plan = $request->only(['type','date_time','area','density','user_id',  'location_id', 'drone_id']);
        $plan = self::updateOrCreate(['id'=>$id],$plan);
        return $plan;
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function locations():HasOne{
        return $this->hasOne(Location::class);
    }
}
