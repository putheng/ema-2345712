<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductIndexResource extends JsonResource
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
            'slug' => $this->slug,
            'currency' => $this->currency,
            'description' => strip_tags($this->description),
            'in_stock' => $this->inStock(),
            'formattedPrice' => $this->formattedPrice,
            'formattedSalePrice' => $this->formattedSalePrice,
            'formattedTaxPrice' => $this->formattedTaxPrice,
            'price' => currency_format($this->price->amount()),
            'sale_price' => currency_format($this->sale_price->amount()),
            'tax_price' => currency_format($this->tax_price->amount()),
            'market_price' => currency_format($this->market_price->amount()),
            'category' => optional($this->category()->first())->id,
            'publish' => (bool) $this->publish,
            'images' => ImageResource::collection($this->image)
        ];
    }
}
