<?php

namespace App\Listeners\Order;

use App\Models\Track;
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


        $track = new Track;
        $track->symbol = '-';
        $track->value = $amount;
        $track->user()->associate(auth()->user());

        $event->order->track()->save($track);

    }
}
