<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;

class PlacementController extends Controller
{
    public function index(Request $request)
    {
    	// $user = $request->user()->agent;
    	// $agent = Agent::where('sponsor_id', 1)->get();

    	$agent = Agent::find(5);


    	dump($agent->ancestors);
    	// return $agent->toFlatTree();
    }
}
