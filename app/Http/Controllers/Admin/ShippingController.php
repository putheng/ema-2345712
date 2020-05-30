<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\ShippingMethodResource;
use App\Http\Requests\StoreShippingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingMethod;
use App\Models\City;

class ShippingController extends Controller
{
	public function index(Request $request)
	{
		return ShippingMethodResource::collection(
			ShippingMethod::get()
		);
	}

    public function store(StoreShippingRequest $request)
    {
    	$city = City::find($request->city_id);

    	$city->shippingMethods()->create([
    		'name' => $request->name,
    		'price' => currency_convert($request->price)->getAmount()
    	]);

    	return ShippingMethodResource::collection(
			ShippingMethod::get()
		)->additional([
			'success' => true,
			'message' => 'Shipping method successfully created.'
		]);
    }

    public function destroy(Request $request, ShippingMethod $shipping)
    {
    	$shipping->delete();
    	
    	return ShippingMethodResource::collection(
			ShippingMethod::get()
		)->additional([
			'success' => true,
			'message' => 'Shipping method successfully created.'
		]);
    }
}
