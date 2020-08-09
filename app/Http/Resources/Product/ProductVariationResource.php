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
            'price' => $this->formattedPrice,
            'currency' => $this->currency,
            'sale_price' => $this->formattedTaxPrice,
            'weight' => $this->weight,
            'pricex' => $this->price->amount(),
            'tax_price' => $this->tax_price->amount(),
            'tax_pricex' => $this->tax_price->amount(),
            'sale_pricex' => $this->sale_price->amount(),
            'stock' => (int) $this->stockCount(),
            'in_stock' => $this->inStock(),
            'stock_count' => (int) $this->stockCount(),
        ];


    }
}
