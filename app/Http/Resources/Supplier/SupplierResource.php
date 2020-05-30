<?php

namespace App\Http\Resources\Supplier;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
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
            'email' => $this->email,
            'supplier' => [
                'id' => optional($this->supplier)->id,
                'name' => optional($this->supplier)->name,
                'phone' => optional($this->supplier)->phone,
                'address' => optional($this->supplier)->address,
                'description' => optional($this->supplier)->description,
                'status' => optional($this->supplier)->status,
            ],
        ];
    }
}
