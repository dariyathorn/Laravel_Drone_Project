<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'date_time',
        'area',
        'density',
        'user_id'
    ];
    public static function store($request, $id = null){
        $plan = $request->only(['type','date_time','area','density','user_id']);
        $plan = self::updateOrCreate(['id'=>$id],$plan);
        return $plan;
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
