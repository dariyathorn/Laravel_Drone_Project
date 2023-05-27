<?php

namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResuorce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     * 
     */

    

    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'type'=>$this->type,
            'date_time'=>$this->date_time,
            'area'=>$this->area,
            'density'=>$this->density,
            'users'=>$this->user,
            'location'=>$this->location,
            // 'drones'=>$this->drones,
            // 'map'=>$this->map,
        ];
    }
}
