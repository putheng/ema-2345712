<?php

namespace App\Http\Resources;

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
            'store' => $this->user->type == 'store' ? $this->user->store->name : '',
            'in_wishlist' => $this->inWishlist(),
            'description' => $this->description,
            'price' => $this->formattedPrice,
            'sale_price' => $this->formattedTaxPrice,
            'stock_count' => $this->stockCount(),
            'in_stock' => $this->inStock(),
            'images' => ImageResource::collection($this->image)
        ];
    }
}
