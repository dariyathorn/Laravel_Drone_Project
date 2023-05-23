<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
<<<<<<< HEAD

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
    

   
=======
>>>>>>> eeaaf1f913a678c427d8e3b895728d5bb61ac040
}
