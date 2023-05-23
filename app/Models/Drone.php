<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'description',
        'bettery',
        'payload',
        'plan_id'
    ];

    public static function store($request, $id = null){
        $drone = $request->only('name','category','description','bettery','payload','plan_id');
        $drone = self::updateOrCreate(['id'=>$id], $drone);
        return $drone;
    }
    
    // public function plans()
    // {
    //     return $this->belongsToMany(Plan::class, 'drone_plans')->withTimestamps();
    // }
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
