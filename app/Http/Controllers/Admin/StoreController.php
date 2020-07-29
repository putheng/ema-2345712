<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\StoresResources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\User;

class StoreController extends Controller
{
    public function commission(Request $request, Store $store)
    {
    	$store->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'name' => $request->store,
        ]);

        $store->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

    	return StoresResources::collection(
            User::isStore()->paginate(200)
        )->additional([
        	'success' => true,
        	'message' => 'Store updated successfully.'
        ]);
    }

    public function approve(Request $request, Store $store)
    {
        $store->update(['approval' => $request->status]);

        return StoresResources::collection(
            User::orderBy('id', 'desc')->isStore()->paginate(200)
        )->additional([
            'success' => true,
            'message' => 'Store updated.'
        ]);
    }
}
