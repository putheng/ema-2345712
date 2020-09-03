<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductVariation;
use App\Http\Resources\Store\ProductVariationResource;
use App\Models\ProductVariationOrder;
use App\Http\Resources\Store\ProductVariationOrderResource;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $orders = auth()->user()->sales()->get();

        // dd($orders);

        // dd($sale->get());
        
    	// $products = $request->user()->products->pluck('id');

    	// $variation = ProductVariation::whereIn('product_id', $products)->get()->pluck('id');

    	
    	// $orders = ProductVariationOrder::whereIn('product_variation_id', $variation)
     //        ->with('order', 'order.products', 'variation', 'order.address', 'order.shippingMethod', 'variation.product', 'variation.type')
     //        ->orderBy('created_at', 'desc')
     //        ->paginate(200);

    	return ProductVariationOrderResource::collection($orders);
    }

    public function update(Request $request, Order $order)
    {
    	$order->update($request->only('status'));

        $products = $request->user()->products->pluck('id');

        $variation = ProductVariation::whereIn('product_id', $products)->get()->pluck('id');

        
        $orders = ProductVariationOrder::whereIn('product_variation_id', $variation)
            ->with('order', 'order.products', 'variation', 'order.address', 'order.shippingMethod', 'variation.product', 'variation.type')
            ->orderBy('created_at', 'desc')
            ->paginate(200);

        return ProductVariationOrderResource::collection($orders);
    }
}
