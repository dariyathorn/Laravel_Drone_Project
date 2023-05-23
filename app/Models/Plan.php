<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'date_time',
        'area',
        'density',
    ];

    public static function store($request, $id = null){
        $plan = $request->only(
            'type',
            'date_time',
            'area',
            'density',
        );
        $plan = self::updateOrCreate(['id'=>$id], $plan);
        return $plan;
    }
    

   
}
