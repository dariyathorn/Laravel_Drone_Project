<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'quality',
        'location_id',
        'farm_id',
    ];

    public static function store($request, $id = null){
        $map = $request->only(
            'name',
            'image',
            'quality',
            'location_id',
            'farm_id',
           
        );
        $map = self::updateOrCreate(['id'=>$id], $map);
        return $map;
    }
    public function locations():BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class, 'drone_id');
    }
}
