<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowDroneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'category'=>$this->category,
            'description'=>$this->description,
            'bettery'=>$this->bettery,
            'payload'=>$this->payload,
            'location'=>$this->drones
            // 'location'=>PlanResuorce::collection($this->location),
        ];
    }
}
