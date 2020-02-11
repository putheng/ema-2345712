<?php

namespace App\Http\Resources;

use App\Http\Resources\Admin\OrderResource;
use Illuminate\Http\Resources\Json\JsonResource;

class VariationOrderResource extends JsonResource
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
            'quantity' => $this->quantity,
            'orders' => new OrderResource($this->order)
        ];
    }
}
