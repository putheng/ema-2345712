<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'email' => $this->email,
            'first_name' => $this->customer->first_name,
            'last_name' => $this->customer->last_name,
            'phone' => $this->customer->phone,
            'gender' => $this->customer->gender,
            'address' => $this->customer->address,
        ];
    }
}
