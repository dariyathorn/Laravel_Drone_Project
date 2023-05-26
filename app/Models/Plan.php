<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
    ];
    public static function store($request, $id = null){
        $plan = $request->only(['type','date_time','area','density','user_id','location_id']);
        $plan = self::updateOrCreate(['id'=>$id], $plan);
        $plans = request('drones');
        $plan->drones()->sync($plans);
        return $plan ;
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function location():BelongsTo{
        return $this->belongsTo(Location::class);
    }
    public function drones():BelongsToMany{
        return $this->belongsToMany(Drone::class, 'plan_drones')->withTimestamps();
    }


    // public static function store($request, $id = null){
    //     $plan = $request->only(
    //         'type',
    //         'date_time',
    //         'area',
    //         'density',
    //     );
    //     $plan = self::updateOrCreate(['id'=>$id], $plan);
    //     return $plan;
    // }
    // public function drone():BelongsTo
    // {
    //     return $this->belongsTo(Drone::class);
    // }
    

   
}
