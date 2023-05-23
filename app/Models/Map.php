<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'quality',
        'location_id',
    ];

    public static function store($request, $id = null){
        $map = $request->only(
            'image',
            'quality',
            'location_id',
        );
        $map = self::updateOrCreate(['id'=>$id], $map);
        return $map;
    }
    public function locations():BelongsToMany
    {
        return $this->belongsToMany(Location::class);
    }
    public function drone():BelongsToMany
    {
        return $this->belongsToMany(Drone::class);
    }
}
