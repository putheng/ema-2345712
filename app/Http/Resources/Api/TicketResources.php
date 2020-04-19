<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResources extends JsonResource
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
            'subject' => $this->subject,
            'type' => $this->gtype->name,
            'priority' => $this->gpriority->name,
            'describe' => $this->describe,
            'user' => [
                'name' => $this->user->name,
                'avatar' => $this->user->avatar(),
            ],
            'status' => ucfirst($this->status),
            'created' => $this->created_at->format('M-d-Y'),
            'updated' => $this->updated_at->format('M-d-Y'),
            'at' => $this->created_at->format("l jS F, Y H:iA")
        ];
    }
}
