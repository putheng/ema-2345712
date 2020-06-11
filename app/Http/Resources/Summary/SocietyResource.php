<?php

namespace App\Http\Resources\Summary;

use Illuminate\Http\Resources\Json\JsonResource;

class SocietyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->user->name,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'status' => $this->status,
        ];
    }
}
