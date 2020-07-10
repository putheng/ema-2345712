<?php

namespace App\Http\Controllers\Rest;

use App\Events\Agent\TransferCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransferRequest;
use App\Http\Requests\TransferPasswordConfirm;
use App\Http\Resources\TransactionResource;
use App\Http\Resources\TransfersResource;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index(Request $request)
    {
        return TransfersResource::collection($request->user()->transfers);
    }

    public function store(StoreTransferRequest $request)
    {
    	return (new TransactionResource($request))
    		->additional(['status' => 'confirm']);
    }

    public function confirm(TransferPasswordConfirm $request)
    {
    	event(new TransferCreated($request));

    	return response()->json([
    		'success' => true,
    		'message' => 'Transfer was successfully.'
    	]);	
    }
}
