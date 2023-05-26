<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'latitude',
        'longitude' 
    ];
    public static function store($request , $id = null){
        $location = $request->only(['latitude','longitude']);
        $location = self::updateOrCreate(['id'=>$id], $location);
        return $location;
    }
    public function plan(): HasOne{
        return $this->hasOne(Plan::class);
    }
    public function drone(): HasOne{
        return $this->hasOne(Drone::class);
    }

    
    
}
