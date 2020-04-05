<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class MeResource extends JsonResource
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
            'email' => $this->email,
            'name' => $this->name,
            'role' => $this->getRoleNames()->first(),
            'permissions' => $this->formatedPermission()
        ];
    }

    protected function formatedPermission()
    {
        return $this->getPermissionsViaRoles()->pluck('name')->map(function($permission){
            return explode(' ', $permission);
        })
        ->toArray();
    }
}
