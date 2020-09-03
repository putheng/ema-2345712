<?php

namespace App\Http\Resources\Store;

use App\Http\Resources\ProductVariationOrderResource;
use App\Http\Resources\AddressResource;
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
            'uuid' => $this->uuid,
            'status' => $this->status,
            'driver' => count($this->users) > 0 ? $this->users->first()->id : '',
            'created_at' => $this->created_at->toDateTimeString(),
            'total' => '$'. number_format($this->pivot->price),
            // 'address' => $this->address,
            'subtotal' => '$'. number_format($this->pivot->price),
            'address' => new AddressResource(
                $this->whenLoaded('address')
            ),
            'bank' => $this->banks,
            'dashboard' => auth()->user()->dashboard(),
            
            'products' => ProductVariationOrderResource::collection(
                $this->whenLoaded('products')
            ),
            'shippingMethod' => new ShippingMethodResource($this->shippingMethod)
        ];
    }
}
