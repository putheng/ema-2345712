<?php

namespace App\Http\Controllers\Rest;

use App\Models\{
	Wishlist,
	Product
};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\WishlistResource;
use App\Http\Requests\Api\StoreWshlistRequest;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
    	return WishlistResource::collection(
    		auth('api')->user()->wishlists()->with('product')->get()
    	);

    }

    public function store(StoreWshlistRequest $request)
    {
    	$product = Product::find($request->product);
    	$wishlist = new Wishlist;

    	if(!auth('api')->user()->wishlists->contains('product_id', $request->product)){

	    	$wishlist->user()->associate(auth('api')->user());
	    	$wishlist->product()->associate($product);

	    	$wishlist->save();
	    }
	    
    	return response()->json([
    		'success' => true,
    	]);
    }

    public function destroy(Request $request)
    {
    	auth('api')->user()
            ->wishlists()
            ->where('product_id', $request->product)
            ->delete();

    	return WishlistResource::collection(
            auth('api')->user()->wishlists()->with('product')->get()
        )->additional([
            'success' => true,
        ]);
    }
}
