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
            'description' => $this->description,
            'in_stock' => $this->inStock(),
            'formattedPrice' => $this->formattedPrice,
            'price' => $this->price->amount(),
            // 'price' => $this->price->amount(),
            'sale_price' => $this->sale_price->amount(),
            'category' => optional($this->category()->first())->id,
            'publish' => (bool) $this->publish,
            'images' => ImageResource::collection($this->image)
        ];
    }
}
