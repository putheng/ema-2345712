<?php

namespace App\Http\Resources\Product;

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
            'formattedPrice' => $this->formattedPrice,
            'price' => $this->price->amount(),
            'category' => $this->categories()->first()->id,
            'publish' => (bool) $this->publish
        ];
    }
}
