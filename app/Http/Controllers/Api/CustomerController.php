<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\CustomerResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
    	return new CustomerResource($request->user());
    }

    public function store(StoreCustomerRequest $request)
    {
    	$request->user()->customer()
    		->update($request->only('first_name', 'last_name', 'phone', 'gender', 'address'));

    	return (new CustomerResource($request->user()))
    		->additional([
    			'success' => true,
    			'message' => 'Profile updated'
    		]);
    }
}