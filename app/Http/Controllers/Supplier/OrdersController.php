<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductVariation;
use App\Models\ProductVariationOrder;
use App\Http\Resources\Supplier\OrderResource;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
    	$products = $request->user()->products->pluck('id');
    	$variations = ProductVariation::whereIn('product_id', $products)->get()->pluck('id');
    	$ordersid = ProductVariationOrder::whereIn('product_variation_id', $variations)->get()->pluck('order_id');
    	$orders = Order::whereIn('id', $ordersid)->get();


    	// $orders = $request->user()->orders()
     //        ->with([
     //            'products',
     //            'products.stock',
     //            'products.type',
     //            'products.product',
     //            'products.product.variations',
     //            'products.product.variations.stock',
     //            'address',
     //            'shippingMethod'
     //        ])
     //        ->latest()
     //        ->paginate(10);

        return OrderResource::collection($orders);
        // return $orders;
    }
}
