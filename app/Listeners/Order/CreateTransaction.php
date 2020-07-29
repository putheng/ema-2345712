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


        $in = $event->order->transactions()->create([
            'total' => $amount,
            'type' => 'Purchase',
            'symbol' => '-'
        ]);

        $event->order->products->each(function($variation, $key) use ($amount, $event){
            $variation->sale()->create([
                'amount' => $amount,
                'user_id' => $event->order->user->id,
                'product_variation_id' => $variation->id,
                'product_id' => $variation->product_id,
                'owner_id' => $variation->product->user->id,
                'quantity' => $variation->pivot->quantity
            ]);
        });

        $user = $event->order->user;

        $track = new Track;
        $track->symbol = '-';
        $track->value = $amount;
        $track->user_id = $user->id;

        $event->order->track()->save($track);

    }
}
