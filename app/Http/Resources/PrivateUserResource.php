<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrivateUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'email' => $this->email,
            'balance' => '$'. number_format($this->balance, 2),
            'name' => $this->name,
            'dashboard' => $this->dashboard(),
            'avatar' => $this->avatar(),
            'currency' => get_currency()->current(),
            'uuid' => optional($this->agent)->uuid,
            'role' => $this->getRoleNames()->first(),
            'permissions' => $this->formatedPermission()
        ];

        return $data;
    }

    protected function formatedPermission()
    {
        return $this->getPermissionsViaRoles()->pluck('name')->map(function($permission){
            $permission = explode(' ', $permission);

            return [
                'action' => $permission[0],
                'subject' => $permission[1],
            ];
            //{ "action": "read", "subject": "Settings" } 
        })
        ->toArray();
    }

    public function avatar()
    {
        if($this->image){
            return $this->image->avatar();
        }

        return url('/images/empty-profile-picture.png');
    }
}
