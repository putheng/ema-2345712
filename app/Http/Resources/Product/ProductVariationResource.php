<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Product\ProductVariationResource;
use App\Models\Collections\ProductVariationCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->resource instanceof ProductVariationCollection) {
            return ProductVariationResource::collection($this->resource);
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price->amount(),
            'sale_price' => $this->sale_price->amount(),
            'weight' => $this->weight,
            'stock' => (int) $this->stockCount(),
            'in_stock' => $this->inStock(),
            'stock_count' => (int) $this->stockCount(),
        ];


    }
}
