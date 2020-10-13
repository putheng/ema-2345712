<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        if ($this->resource instanceof Collection) {
            return ProductVariationResource::collection($this->resource);
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->formattedPrice,
            'sale_price' => $this->formattedSalePrice,
            'price_varies' => $this->priceVaries(),
            'stock_count' => (int) $this->stockCount(),
            'type' => $this->type->name,
            'qty' => $this->orders->where('status', $this->pivot->status)->sum('pivot.quantity'),
            'in_stock' => $this->inStock(),
            'product' => new ProductIndexResource($this->product),
        ];
    }
}
