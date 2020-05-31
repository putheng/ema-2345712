<?php

namespace App\Http\Resources\Admin;

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
            'description' => strip_tags($this->description),
            'in_stock' => $this->inStock(),
            'formattedPrice' => $this->formattedPrice,
            'price' => currency_format($this->price->amount()),
            'sale_price' => currency_format($this->sale_price->amount()),
            'tax_price' => currency_format($this->tax_price->amount()),
            'category' => optional($this->category()->first())->id,
            'publish' => (bool) $this->publish,
            'image' => url('uploads/products'. $this->image->first()->url)
        ];
    }
}