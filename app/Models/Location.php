<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
}
