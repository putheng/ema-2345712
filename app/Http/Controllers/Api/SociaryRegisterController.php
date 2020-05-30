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
            $user->update(['type' => 'society']);
            $user->assignRole('society');

        	event(new AgentCreated($user, $request->sponsor, $request->sponsor));
        }else{
            $user->customer()->create([
                'phone' => $request->phone
            ]);

            $user->update(['type' => 'dashboard']);
            $user->assignRole('customer');
        }

        return (new PrivateUserResource($user))
        	->additional([
        		'success' => true
        	]);
    }
}
