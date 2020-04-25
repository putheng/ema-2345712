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
                'name' => $this->supplier->name,
                'phone' => $this->supplier->phone,
                'address' => $this->supplier->address,
                'description' => $this->supplier->description,
            ],
        ];
    }
}
