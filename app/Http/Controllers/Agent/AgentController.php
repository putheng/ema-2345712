<?php

namespace App\Http\Controllers\Agent;

use App\Models\User;
use App\Models\Agent;
use Illuminate\Http\Request;
use App\Events\Agent\AgentCreated;
use App\Http\Controllers\Controller;
use App\Http\Resources\Agent\AgentResource;
use App\Http\Resources\Agent\SponsorResource;
use App\Http\Requests\Agent\StoreAgentRequest;

class AgentController extends Controller
{
    public function store(StoreAgentRequest $request)
    {
    	$user = User::create($request->only('email', 'name', 'password'));

        $user->update(['type' => 'society']);
        $user->assignRole('society');

    	event(new AgentCreated($user, $request->placement, $request->sponsor));

    	return (new AgentResource($user->agent))
    		->additional([
    			'success' => true,
                'message' => 'Member created successfuly'
    		]);
    }

    public function filter(Request $request)
    {

        $agent = Agent::where('uuid', strtoupper($request->get('id', '')));

        if($agent->count()){
            return (new AgentResource($agent->first()))
                ->additional(['count' => $agent->count()]);
        }

        return response()->json([
            'count' => 0
        ]);
    }

    public function show(Request $request)
    {
        $user = $request->user();
        
        // $user = User::find(76);
    	return new AgentResource($user->agent);
    }

    public function members(User $user, Request $request)
    {
        return new AgentResource($user->agent);
    }

    public function agentsuuid(Request $request)
    {
        $agent = Agent::where('uuid', strtoupper($request->get('q', '')));

        if($agent->count()){
            return new AgentResource($agent->first());
        }
    }

    public function sponsor(Request $request)
    {
        $agent = Agent::where('sponsor_id', $request->user()->agent->id)->get();

        return SponsorResource::collection($agent);
    }
}
