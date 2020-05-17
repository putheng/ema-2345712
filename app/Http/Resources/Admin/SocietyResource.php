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
            'uuid' => optional($this->agent)->uuid,
            'dob' => optional($this->society)->dob,
            'name' => $this->name,
            'first' => optional($this->society)->first,
            'last' => optional($this->society)->last,
            'gender' => optional($this->society)->gender,
            'email' => $this->email,
            'phone' => optional($this->society)->phone,
            'status' => optional($this->society)->status,
        ];
    }
}
