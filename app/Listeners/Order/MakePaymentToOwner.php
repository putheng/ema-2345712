<?php

namespace App\Listeners\Order;

use App\Events\Order\OrderPaid;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MakePaymentToOwner
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
        // $products = $event->order->products;

        // file_put_contents('file', json_encode($event->order));

        // $products->each(function($variation, $key){
        //     $price = $variation->sale_price->amount();

        //     // $qunity = $variation->
            

        //     // file_put_contents('amount'. $key, '');

        //     // $variation->product->user->id;
        // });
    }
}
