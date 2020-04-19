<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketReplyResource extends JsonResource
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
            'user' => [
                'name' => $this->user->name,
                'avatar' => $this->user->avatar()
            ],
            'body' => $this->body,
            'created' => $this->created_at->format("l jS F, Y H:iA")
        ];
    }
}
