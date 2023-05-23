<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public static function store($request, $id = null){
        $role = $request->only(['name']);
        $role = self::updateOrCreate(['id'=>$id],$role);
        return $role;
    }
}
