<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Instruction extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_start',
        'date_end',
        'action',
        'throttle',
        'user_id',
        'drone_id',
    ];

    public static function store($request, $id = null){
        $instruction = $request->only(
            'date_start',
            'date_end',
            'action',
            'throttle',
            'user_id',
            'drone_id',
        );
        $instruction = self::updateOrCreate(['id'=>$id], $instruction);
        return $instruction;
    }   

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function drone():HasOne
    {
        return $this->hasOne(Drone::class);
    }
}
