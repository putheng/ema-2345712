<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\OrderResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

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
                'banks'
            ])
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
                'banks'
            ])
            ->latest()
            ->paginate(50);

        return OrderResource::collection($orders);
    }
}
