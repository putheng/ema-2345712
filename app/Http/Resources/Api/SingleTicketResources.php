<?php

namespace App\Http\Resources\Api;

use App\Http\Resources\Api\TicketResources;
use App\Http\Resources\Api\TicketReplyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleTicketResources extends TicketResources
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'children' => TicketReplyResource::collection($this->children)
        ]);
    }
}
