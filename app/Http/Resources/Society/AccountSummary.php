<?php

namespace App\Http\Resources\Society;

use App\Http\Resources\OrderResource;
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
            'earning' => get_currency()->current() . ' '. number_format(0, 2),
            'transactions' => TrackResources::collection($this->tracks()->latest()->take(10)->get()),
            'orders' => OrderResource::collection($this->getOrders())
        ];
    }

    protected function getPurchase()
    {
        $orders = $this->orders;

        return [
            'counts' => $orders->count(),
            'expenses' => get_currency()->current() .' '. number_format(
                $this->order()->where('status', 'processing')->get()->sum('total'), 2),
        ];
    }

    protected function getOrders()
    {
        return $this->orders()
            ->with([
                'products',
                'products.stock',
                'products.type',
                'products.product',
                'products.product.variations',
                'products.product.variations.stock',
                'address',
                'shippingMethod'
            ])
            ->latest()
            ->paginate(10);
    }
}
