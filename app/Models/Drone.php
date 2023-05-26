<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'map_id',
        'location_id',
    ];

    public static function store($request, $id = null){
        $drone = $request->only(
            'name',
            'category',
            'description',
            'bettery',
            'payload',
            'user_id',
            'map_id',
            'location_id',
        );
        if($id){
            $drone = self::updateOrCreate(['id'=>$id], $drone);

        }
        else{
            $drone = self::create($drone);
            $id = $drone->id;
        }
        return $drone;
    }
    
    // public function plans()
    // {
    //     return $this->belongsToMany(Plan::class, 'drone_plans')->withTimestamps();
    // }
    public function drones():BelongsToMany
    {
        return $this->belongsToMany(Plan::class, 'plan_drones')->withTimestamps();
    }
    public function maps():HasOne{
        return $this->hasOne(Map::class);
    }
    public function location():BelongsTo{
        return $this->belongsTo(Location::class);
    }
    
}
