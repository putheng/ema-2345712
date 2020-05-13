<?php

namespace App\Http\Controllers\Admin;

use App\Events\Agent\TransferCreated;
use App\Http\Resources\TransactionResource;
use App\Http\Requests\Admin\StoreTransferRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function store(StoreTransferRequest $request)
    {
    	// return (new TransactionResource($request))
    	// 	->additional(['status' => 'confirm']);

    		event(new TransferCreated($request));

    	return response()->json([
    		'success' => true,
    		'message' => 'Transfer was successfully.'
    	]);	
    }
}
