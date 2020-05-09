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
            'store' => $this->store->name,
            'address' => $this->store->address,
            'phone' => $this->store->phone,
            'status' => $this->store->status,
            'id' => $this->store->id,
            'uuid' => $this->store->uuid,
            'commission' => $this->store->commission,
        ];
    }
}
