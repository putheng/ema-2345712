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
    	$this->validate($request, [
    		'commission' => 'required|numeric'
    	]);

    	$store->update(['commission' => $request->commission]);

    	return StoresResources::collection(
            User::isStore()->paginate(20)
        )->additional([
        	'success' => true,
        	'message' => 'Store updated successfully.'
        ]);
    }
}
