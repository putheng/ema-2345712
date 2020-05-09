<?php

namespace App\Http\Resources\Admin;

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
            'dob' => $this->dob,
            'first' => $this->first,
            'last' => $this->last,
            'gender' => $this->gender,
            'id_code' => $this->id_code,
            'phone' => $this->phone,
            'status' => $this->status,
        ];
    }
}
