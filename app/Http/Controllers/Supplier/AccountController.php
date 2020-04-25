<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Resources\Supplier\SupplierResource;
use App\Http\Requests\Supplier\AccountRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
    	return new SupplierResource(auth()->user());
    }

    public function store(AccountRequest $request)
    {
    	$user = $request->user();

    	$user->update($request->only('name'));
    	$user->supplier()->update([
    		'name' => $request->username,
    		'phone' => $request->phone,
    		'address' => $request->address,
    		'description' => $request->description,
    	]);

    	return response()->json([
    		'success' => true,
    		'message' => 'Profile updated'
    	]);
    }
}
