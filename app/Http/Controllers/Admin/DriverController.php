<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class DriverController extends Controller
{
    public function index(Request $request)
    {
        return User::role('delivery')->get()->map(function($user){
            return [
                'id' => $user->id,
                'name' => $user->name,
            ];
        });
    }

    public function store(Request $request)
    {
    	$order = Order::find($request->order);

    	$order->users()->sync($request->driver);
    }
}
