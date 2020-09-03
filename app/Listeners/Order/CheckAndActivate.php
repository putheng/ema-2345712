<?php

namespace App\Listeners\Order;

use App\Events\Order\OrderPaid;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CheckAndActivate
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderPaid  $event
     * @return void
     */
    public function handle(OrderPaid $event)
    {
        $order = $event->order;

        $subtotal = $event->order->subtotal->amount();

        if($order->currency == 'USD' && $subtotal > '10'){
            $this->activate($order->user);
        }

        if($order->currency == 'KHR' && $subtotal > '40000'){
            $this->activate($order->user);
        }
    }

    protected function activate($user)
    {
        if($user->type == 'society'){
            $user->agent()->update([
                'status' => 'active'
            ]);
        }
    }
}
