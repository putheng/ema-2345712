<?php

namespace App\Http\Controllers\Agent;

use App\Http\Resources\Agent\AgentsResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;

class PlacementController extends Controller
{
    public function index(Request $request)
    {
    	$user = $request->user()->agent;
    	
    	return new AgentsResource($user);
    }
}
