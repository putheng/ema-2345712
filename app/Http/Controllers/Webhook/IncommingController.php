<?php

namespace App\Http\Controllers\Webhook;


use App\Models\Order;
use Illuminate\Http\Request;
use App\Events\Order\OrderPaid;
use App\Http\Controllers\Controller;
use App\Exceptions\PaymentFailedException;

class IncommingController extends Controller
{
    public function store(Request $request)
    {
    	if($request->paid_by){
            $id = $request->checkout_ref;

            $order = Order::uuid($id);

            try {

                $order->banks()->create([
                    'bank_name' => $request->bank,
                    'bank_ref' => $request->bank_ref,
                ]);

                event(new OrderPaid($order));
                
            } catch (PaymentFailedException $e) {

                // event(new OrderPaymentFailed($order));
            }
        }
    }

    public function content(Request $request)
    {
    	$url = $request->url;

    	return redirect($url);
    }

    public function continue(Request $request)
    {

    }
}
