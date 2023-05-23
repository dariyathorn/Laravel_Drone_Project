<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'latitude',
        'longitude',
    ];

    public static function store($request, $id = null){
        $location = $request->only(
            'latitude',
            'longitude',
        );
        if($id){
            $location = self::updateOrCreate(['id'=>$id], $location);

        }
        else{
            $location = self::create($location);
            $id = $location->id;
        }
        return $location;
    }
    public function maps():HasMany
    {
        return $this->hasMany(Map::class);
    }
    
}
