<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TrackResources extends JsonResource
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
            'id' => $this->uuid,
            'value' => auth()->user()->currency .' '. number_format($this->value, 2),
            'symbol' => $this->symbol,
            'type' => ucfirst($this->trackable_type),
            'created' => $this->created_at->format("l jS F, Y H:iA")
        ];
    }
}
