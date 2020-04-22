<?php

namespace App\Http\Resources\Society;

use App\Http\Resources\Api\TrackResources;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountSummary extends JsonResource
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
            'purchase' => $this->getPurchase(),
            'earning' => $this->currency . ' '. number_format(0, 2),
            'transactions' => TrackResources::collection($this->tracks()->take(10)->get())
        ];
    }

    protected function getPurchase()
    {
        $orders = $this->orders;

        return [
            'counts' => $orders->count(),
            'expenses' => $this->currency .' '. number_format($this->order->sum('total'), 2),
        ];
    }
}
