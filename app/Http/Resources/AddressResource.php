<?php

namespace App\Http\Resources;

use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'name' => $this->name,
            'address' => $this->address,
            'city' => new CityResource($this->city),
            'phone' => $this->phone,
            'country' => new CountryResource($this->country),
            'default' => (bool) $this->default
        ];
    }
}
