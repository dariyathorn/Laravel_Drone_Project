<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'description',
    ];

    public static function store($request, $id = null){
        $drone = $request->only(
            'name',
            'category',
            'description',
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
    
    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'drone_plans')->withTimestamps();
    }
}
