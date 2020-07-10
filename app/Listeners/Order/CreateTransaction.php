<?php

namespace App\Listeners\Order;

use App\Models\Track;
use App\Models\Sale;
use App\Events\Order\OrderPaid;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateTransaction
{
    /**
     * Handle the event.
     *
     * @param  OrderPaid  $event
     * @return void
     */
    public function handle(OrderPaid $event)
    {
        $amount = $event->order->total()->amount();

        $event->order->transactions()->create([
            'total' => $amount,
            'type' => 'Purchase',
            'symbol' => '-'
        ]);

        $event->order->products->each(function($variation, $key) use ($amount){
            $variation->sale()->create([
                'amount' => $amount,
                'user_id' => auth()->id() != null auth()->id() : auth('api')->id(),
                'product_variation_id' => $variation->id,
                'product_id' => $variation->product_id,
                'owner_id' => $variation->product->user->id,
                'quantity' => $variation->pivot->quantity
            ]);
        });

        $user = auth()->user() != null ? auth()->user() : auth('api')->user();

        $track = new Track;
        $track->symbol = '-';
        $track->value = $amount;
        $track->user()->associate($user);

        $event->order->track()->save($track);

    }
}
