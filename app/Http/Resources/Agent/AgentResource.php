<?php

namespace App\Http\Resources\Agent;

use App\Http\Resources\Agent\AgentsResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AgentResource extends JsonResource
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
            'name' => $this->user->name,
            'level' => $this->level,
            'status' => $this->status,
            'child' => $this->child_count,
            'limitedExceded' => $this->child_count >= 3,
            'user_id' => $this->user_id,
            'avatar' => $this->avatar(),
            'children' => AgentsResource::collection($this->children)
        ];
    }

    public function avatar()
    {
        if($this->user->image){
            return $this->user->image->avatar();
        }

        return secure_asset('/images/empty-profile-picture.png');
    }
}
