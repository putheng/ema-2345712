<?php

namespace App\Http\Controllers\Cart;

use App\Cart\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartStoreRequest;
use App\Http\Requests\Cart\CartUpdateRequest;
use App\Http\Resources\Cart\CartResource;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request, Cart $cart)
    {
        $cart->sync();

        $request->user()->load([
            'cart.product', 'cart.product.variations.stock', 'cart.stock', 'cart.type'
        ]);

        return (new CartResource($request->user()))
            ->additional([
                'meta' => $this->meta($cart, $request)
            ]);
    }

    protected function meta(Cart $cart, Request $request)
    {
        return [
            'empty' => $cart->isEmpty(),
            'subtotal' => $cart->subtotal()->formatted(),
            'total' => $cart->withShipping($request->shipping_method_id)->total()->formatted(),
            'changed' => $cart->hasChanged(),
        ];
    }

    protected function getStore()
    {
        $id =  request('products')[0]['id'];

        $variation = ProductVariation::find($id);
        $user = $variation->product->user;

        if($user->type == 'store'){
            return $user->store->id;
        }

        return 0;
    }

    protected function checkStore($products)
    {
        $storeid = $this->getStore();

        return auth()->user()->cart->map(function($cart) use ($storeid){
            if($cart->product->user && $cart->product->user->type == 'store'){
                if($storeid != $cart->product->user->store->id){
                    return false;
                }
            }
            
            return true;
        })->contains(false);

    }

    public function store(CartStoreRequest $request, Cart $cart)
    {
        if($this->checkStore($request->products)){
            return response()->json([
                'errors' => [
                    'message' => 'សូមអធ្យាស្រ័យ លោកអ្នកមិនអាចបញ្ជាទិញពីហាងផ្សេងគ្នាក្នុងពេលតែមួយបានទេ.'
                ] 
            ], 422);
        }

        $cart->add($request->products);

        $cart->sync();

        $request->user()->load([
            'cart.product', 'cart.product.variations.stock', 'cart.stock', 'cart.type'
        ]);

        return (new CartResource($request->user()))
            ->additional([
                'meta' => $this->meta($cart, $request)
            ]);
    }

    public function update(ProductVariation $productVariation, CartUpdateRequest $request, Cart $cart)
    {
        $cart->update($productVariation->id, $request->quantity);
    }

    public function destroy(ProductVariation $productVariation, Cart $cart)
    {
        $cart->delete($productVariation->id);
    }
}
