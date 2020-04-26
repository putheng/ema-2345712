<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Supplier\SupplierResource;
use App\Http\Requests\Supplier\SupplierRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        return SupplierResource::collection(User::isSupplier()->get());
    }

    public function store(SupplierRequest $request)
    {
    	$user = User::create($request->only('name', 'email', 'password'));

        $user->update(['type' => 'supplier']);
        $user->assignRole('supplier');

    	$user->supplier()->create([
    		'name' => $request->company,
    		'phone' => $request->phone,
    		'address' => $request->address,
    		'description' => $request->description,
    	]);

    	return response()->json([
            'success' => true,
            'message' => 'Supplier created successfuly'
        ]);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $supplier->update($request->only('status'));

        return SupplierResource::collection(User::isSupplier()->get())
            ->additional([
            'success' => true,
            'message' => 'Supplier activated successfuly'
        ]);
    }
}
