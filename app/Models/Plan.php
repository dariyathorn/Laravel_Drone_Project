<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        if($id){
            $plan = self::updateOrCreate(['id'=>$id], $plan);

        }
        else{
            $plan = self::create($plan);
            $id = $plan->id;
        }
        return $plan;
    }
    

   
}
