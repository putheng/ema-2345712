<?php

namespace App\Http\Resources\Store;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductVariationResource;
use App\Http\Resources\OrderResource;

class ProductVariationOrderResource extends JsonResource
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
            'quantity' => $this->quantity,
            'order' => new OrderResource($this->order),
            'product_variation' => new ProductVariationResource($this->variation),
        ];
    }
}
