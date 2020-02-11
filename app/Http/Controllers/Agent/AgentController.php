<?php

namespace App\Http\Controllers\Agent;

use App\Models\User;
use App\Models\Agent;
use Illuminate\Http\Request;
use App\Events\Agent\AgentCreated;
use App\Http\Controllers\Controller;
use App\Http\Resources\Agent\AgentResource;
use App\Http\Requests\Agent\StoreAgentRequest;

class AgentController extends Controller
{
    public function store(StoreAgentRequest $request)
    {
    	$user = User::create($request->only('email', 'name', 'password'));

    	event(new AgentCreated($user, $request->placement));

    	return (new AgentResource($user->agent))
    		->additional([
    			'success' => true
    		]);
    }

    public function show(Request $request)
    {
    	return new AgentResource($request->user()->agent);
    }
}
