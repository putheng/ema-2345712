<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class SocietyResources extends JsonResource
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
            'dob' => $this->dob,
            'first' => $this->first,
            'last' => $this->last,
            'gender' => $this->gender,
            'id_code' => $this->id_code,
            'phone' => $this->phone,
            'status' => $this->status,
            'age' => $this->age,
            'id_image' => $this->getImage(),
            'referal' => url('auth/register?id='. auth()->user()->agent->uuid),

            'id_type' => [
                'id' => optional($this->id_type)->id,
                'name' => optional($this->id_type)->name,
            ],
        ];
    }

    protected function getImage()
    {
        if($this->image->count()){
            $img = $this->image()->orderBy('id', 'desc')->first();

            return [
                'id', $img->id,
                'url' => url('uploads/idphoto'. $img->url)
            ];
        }
    }
}
