<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Resources\Delivery\ShipmentsResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class ShipmentController extends Controller
{
    public function index(Request $request)
    {
    	$orders = $request->user()
            ->shipments()
            ->with([
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
            ->paginate(10);

        return ShipmentsResource::collection($orders);
    }

    public function processing(Request $request)
    {
        $orders = $request->user()
            ->shipments()
            ->where('status', 'Processing')
            ->with([
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
            ->paginate(10);

        return ShipmentsResource::collection($orders);
    }

    public function completed(Request $request)
    {
        $orders = $request->user()
            ->shipments()
            ->where('status', 'Completed')
            ->with([
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
            ->paginate(10);

        return ShipmentsResource::collection($orders);
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->only('status'));

        $orders = $request->user()
            ->shipments()
            ->with([
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
            ->paginate(10);

        return ShipmentsResource::collection($orders);
    }
}
