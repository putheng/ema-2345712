<?php

namespace App\Http\Resources\Store;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductVariationResource;
use App\Http\Resources\Store\OrderResource;
use App\Models\ProductVariation;

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
            'quantity' => $this->pivot->quantity,
            'price' => '$'. ($this->pivot->price * $this->pivot->quantity),
            'order' => new OrderResource($this),
            'product_variation' => new ProductVariationResource(
                ProductVariation::find($this->pivot->product_variation_id)
            ),
        ];
    }
}
