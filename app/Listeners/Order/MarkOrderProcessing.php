<?php

namespace App\Listeners\Order;

use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MarkOrderProcessing
{
    /**
     * Handle the event.
     *
     * @param  OrderCreated  $event
     * @return void
     */
    public function handle($event)
    {
        $event->order->update([
            'status' => Order::PROCESSING
        ]);

        $event->order->products->each(function($item){
            $item->pivot->status = 'Processing';
            $item->pivot->save();

            User::find($item->pivot->owner_id)
                ->increment('earning', $item->pivot->price);
        });
    }
}
