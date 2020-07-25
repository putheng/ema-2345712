<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function success(Request $request)
    {
    	if($request->code == 'SUCCESS')
    	{
    		$message = $request->message;

    		$data = json_decode($request->data);

    		$order = Order::where('uuid', $data->reference_id)->first();
    		$products = $order->products;

            $date = Carbon::parse($data->tran_date)->format('d-m-Y');

    		return view('payment.success', compact('data', 'order', 'products', 'date'));	
    	}

    }

    public function cancel_order(Request $request)
    {
    	if($request->code == 'CANCEL')
    	{
    		$message = $request->message;

            $data = json_decode($request->data);

            $order = Order::where('uuid', $data->reference_id)->first();
            $products = $order->products;

            return view('payment.cancel', compact('data', 'order', 'products'));
    	}

    }

    public function pay_later(Request $request)
    {

        if($request->code == 'PENDING')
        {
            $message = $request->message;

            $data = json_decode($request->data);

            $date = Carbon::parse($data->bill_date)->format('d-m-Y');

            $order = Order::where('uuid', $data->reference_id)->first();
            $products = $order->products;

            return view('payment.pay-later', compact('data', 'order', 'products', 'date'));

        }
    }
}
