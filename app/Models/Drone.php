<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'description',
        'bettery',
        'payload',
        'user_id',
    ];

    public static function store($request, $id = null){
        $drone = $request->only(
            'name',
            'category',
            'description',
            'bettery',
            'payload',
            'user_id',
        );
        $drone = self::updateOrCreate(['id'=>$id], $drone);
        return $drone;
    }
    
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function plans():HasMany
    {
        return $this->hasMany(Plan::class);
    }
    public function maps():HasMany
    {
        return $this->hasMany(Map::class);
    }
}
