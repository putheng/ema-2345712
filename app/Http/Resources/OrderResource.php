<?php

namespace App\Http\Resources;

use App\Http\Resources\ShippingMethodResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'status' => $this->status,
            'created_at' => $this->created_at->toDateTimeString(),
            'total' => $this->total()->formatted(),
            // 'total' => $this->total()->add($this->shippingMethod->price)->formatted(),
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
