<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstructionResource extends JsonResource
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
            'date_start'=>$this->date_start,
            'date_end'=>$this->date_end,
            'action'=>$this->action,
            'throttle'=>$this->throttle,
            'user_id'=>$this->users,
            'drone_id'=>$this->drones
        ];
    }
}
