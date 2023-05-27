<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlanDrone extends Model
{
    use HasFactory;
    protected $fillable = [
        'action',
        'plan_id',
        'drone_id',
    ];
    public static function store($requset, $id = null){
        $instrution = $requset->only(['action','plan_id','drone_id']);
        $instrution = self::updateOrCreate(['id'=>$id], $instrution);
        return $instrution ;
    }
    public function drone():BelongsTo{
        return $this->belongsTo(Drone::class);
    }
    public function plan():BelongsTo{
        return $this->belongsTo(Plan::class);
    }
}
