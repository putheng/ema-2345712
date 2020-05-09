<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransfersResource extends JsonResource
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
            'date' => $this->created_at->format('Y-M-d H:i:s'),
            'uuid' => $this->uuid,
            'mark' => substr($this->mark, 0, 30),
            'amount' => $this->currency .' '. number_format($this->amount),
            'fee' => $this->currency .' '. $this->fee,
            'sender' => optional($this->senderid)->name,
            'receiver' => optional($this->receiverid)->name,
        ];
    }
}
