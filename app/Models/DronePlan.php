<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DronePlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'drone_id',
        'plan_id',
    ];

    public static function store($request, $id = null)
    {
        $dronePlan = $request->only(
            'drone_id',
            'plan_id',
        );
        if ($id) {
            $dronePlan = self::updateOrCreate(['id' => $id], $dronePlan);
        } else {
            $dronePlan = self::create($dronePlan);
            $id = $dronePlan->id;
        }
        return $dronePlan;
    }

    public function drone()
    {
        return $this->belongsTo(Drone::class, 'drone_id');
    }
}
