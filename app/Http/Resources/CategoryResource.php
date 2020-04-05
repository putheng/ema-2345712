<?php

namespace App\Http\Resources;

use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'enable' => $this->enable,
            'products' => $this->products->count(),
            'image' => optional($this->image)->url,
            'children' => CategoryResource::collection($this->whenLoaded('children'))
        ];
    }
}
