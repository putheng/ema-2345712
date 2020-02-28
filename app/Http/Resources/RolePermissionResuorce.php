<?php

namespace App\Http\Resources;

use App\Http\Resources\PermissionResource;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\Permission\Models\Permission;

class RolePermissionResuorce extends RoleResource
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
            'permission' => $this->permissions->pluck('id')->toArray(),
            'permissions' => PermissionResource::collection(Permission::get())
        ]);
    }
}
