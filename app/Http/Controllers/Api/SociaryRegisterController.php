<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\PrivateUserResource;
use App\Models\User;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Events\Agent\AgentCreated;

class SociaryRegisterController extends Controller
{
	use RegistersUsers;

    public function store(RegisterRequest $request)
    {
        $user = User::create($request->only('email', 'name', 'password'));

        $this->guard()->login($user);

        if($request->sponsor){
        	event(new AgentCreated($user, $request->sponsor, $request->sponsor));
        }else{
            Agent::create([
                'user_id' => $user->id,
                'level' => 1
            ]);
        }

        $user->update(['type' => 'society']);
        $user->assignRole('society');

        return (new PrivateUserResource($user))
        	->additional([
        		'success' => true
        	]);
    }
}
