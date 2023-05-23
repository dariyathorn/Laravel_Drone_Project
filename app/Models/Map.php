<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'quality',
    ];

    public static function store($request, $id = null){
        $map = $request->only(
            'image',
            'quality',
        );
        if($id){
            $map = self::updateOrCreate(['id'=>$id], $map);

        }
        else{
            $map = self::create($map);
            $id = $map->id;
        }
        return $map;
    }
}
