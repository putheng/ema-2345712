<?php

namespace App\Http\Resources\Agent;

use Illuminate\Http\Resources\Json\JsonResource;

class SponsorResource extends JsonResource
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
            'uuid' => $this->uuid,
            'name' => optional($this->user)->name,
            'level' => $this->level,
            'status' => $this->status,
            'child' => $this->child_count,
            'user_id' => $this->user_id,
            'avatar' => $this->avatar(),
            'phone' => '',
            'email' => '',
            // 'parent' => new SponsorResource($this->parent)
        ];
    }

    public function avatar()
    {
        if(optional($this->user)->image){
            return $this->user->image->avatar();
        }

        return url('/images/empty-profile-picture.png');
    }
}
