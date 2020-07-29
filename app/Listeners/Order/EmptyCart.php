<?php

namespace App\Listeners\Order;

use App\Cart\Cart;
use App\Events\Order\OrderCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmptyCart
{
    // protected $cart;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->cart = $cart;
    }

    /**
     * Handle the event.
     *
     * @param  OrderCreated  $event
     * @return void
     */
    public function handle($even)
    {
        // $this->cart->empty();
        (new Cart($even->order->user))->empty();
    }
}
