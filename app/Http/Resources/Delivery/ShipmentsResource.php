<?php

namespace App\Http\Resources\Delivery;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\AddressResource;
use App\Http\Resources\ShippingMethodResource;
use App\Http\Resources\ProductVariationOrderResource;

class ShipmentsResource extends JsonResource
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
            'uuid' => $this->uuid,
            'status' => $this->status,
            'created_at' => $this->created_at->toDateTimeString(),
            'total' => $this->total()->formatted(),
            // 'address' => $this->address,
            'subtotal' => $this->subtotal->formatted(),
            'address' => new AddressResource(
                $this->whenLoaded('address')
            ),
            'bank' => $this->banks,
            'dashboard' => auth()->user()->dashboard(),
            
            'products' => ProductVariationOrderResource::collection(
                $this->whenLoaded('products')
            ),
            'shippingMethod' => new ShippingMethodResource(
                $this->whenLoaded('shippingMethod')
            )
        ];
    }
}
