<?php

namespace App\Http\Resources\Agent;

use Illuminate\Http\Resources\Json\JsonResource;

class AgentsResource extends JsonResource
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
            'child' => $this->child_count,
            'user_id' => $this->user_id,
            'limitedExceded' => $this->child_count <= get_level($this->level)->value,
            'avatar' => $this->avatar(),
            'children' => AgentsResource::collection($this->children)
        ];
    }

    public function avatar()
    {
        if($this->user->image){
            return $this->user->image->avatar();
        }

        return url('/images/empty-profile-picture.png');
    }
}
