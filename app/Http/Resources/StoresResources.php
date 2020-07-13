<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoresResources extends JsonResource
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
            'username' => $this->name,
            'email' => $this->email,
            'userid' => $this->id,
            'store' => optional($this->store)->name,
            'address' => optional($this->store)->address,
            'phone' => optional($this->store)->phone,
            'status' => optional($this->store)->status,
            'id' => optional($this->store)->id,
            'uuid' => optional($this->store)->uuid,
            'latitude' => optional($this->store)->latitude,
            'commission' => optional($this->store)->commission,
            'longitude' => optional($this->store)->longitude,
            'approval' => optional($this->store)->approval,
            'sponsor' => optional($this->store)->sponsor_id,
            'vat' => (boolean) optional($this->store)->vat,
        ];
    }
}
