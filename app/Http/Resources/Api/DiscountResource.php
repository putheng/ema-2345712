<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
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
            'route' => route('show.product', $this),
            'in_wishlist' => $this->inWishlist(),
            'category' => [
                'name' => $this->category->name,
                'slug' => $this->category->slug,
            ],
            'price' => $this->formattedPrice,
            'sale_price' => $this->formattedSalePrice,
            'image' => $this->getImage()
        ];
    }

    public function getImage()
    {
        if($this->image){
            return $this->image()->first()->product();
        }

        return url('image/empty-profile-picture.png');
    }
}
