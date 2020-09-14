<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\OrderResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with([
                'products',
                'products.stock',
                'products.type',
                'products.product',
                'products.product.variations',
                'products.product.variations.stock',
                'address',
                'shippingMethod',
                'banks',
                'users',
            ])
            ->latest()
            ->paginate(50);

        return OrderResource::collection($orders);
    }

    public function processing(Request $request)
    {
        $orders = Order::with([
                'products',
                'products.stock',
                'products.type',
                'products.product',
                'products.product.variations',
                'products.product.variations.stock',
                'address',
                'shippingMethod',
                'banks',
                'users',
            ])
            ->where('status', 'Processing')
            ->latest()
            ->paginate(50);

        return OrderResource::collection($orders);
    }

    public function completed(Request $request)
    {
        $orders = Order::with([
                'products',
                'products.stock',
                'products.type',
                'products.product',
                'products.product.variations',
                'products.product.variations.stock',
                'address',
                'shippingMethod',
                'banks',
                'users',
            ])
            ->where('status', 'Completed')
            ->latest()
            ->paginate(50);

        return OrderResource::collection($orders);
    }

    public function update(Request $request, Order $order)
    {
    	$order->update($request->only('status'));

    	$orders = Order::with([
                'products',
                'products.stock',
                'products.type',
                'products.product',
                'products.product.variations',
                'products.product.variations.stock',
                'address',
                'shippingMethod',
                'banks',
                'users',
            ])
            ->withStatus($request->status)
            ->latest()
            ->paginate(50);

        $this->update_variation_order($order, $request->status);

        return OrderResource::collection($orders);
    }

    protected function update_variation_order($order, $status)
    {
        $statuses = ['Refund', 'Cancellation'];

        $order->products->each(function($item) use ($status, $statuses){
            $item->pivot->status = $status;
            $item->pivot->save();


            if(in_array($status, $statuses)){
                User::find($item->pivot->owner_id)
                ->decrement('earning', $item->pivot->price);
            }

        });
    }
}
