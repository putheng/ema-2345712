<?php

namespace App\Http\Controllers\Rest;

use App\Models\Newsletter;
use App\Http\Requests\Api\StoreNewsletterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(StoreNewsletterRequest $request)
    {

    	if(Newsletter::where('email', $request->email)->count() == 0){
    		Newsletter::create($request->only('email'));
    	}

    	return response()->json([
    		'success' => true
    	]);
    }
}
