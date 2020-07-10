<?php

namespace App\Http\Controllers\Rest;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Resources\PrivateUserResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Agent;

class SociaryLoginController extends Controller
{
    
    public function login(Request $request)
    {
    	$this->validateLogin($request);

    	$agent = Agent::where('uuid', $request->id)->first();

    	if(!$agent){
    		 return response()->json([
                'errors' => [
                    'id' => ['Could not sign you in with those details.']
                ]
            ], 422);
    	}

		if (!$token = $this->guard()->attempt(['email' => $agent->user->email, 'password' => $request->password], $request->filled('remember'))) {
            return response()->json([
                'errors' => [
                    'ids' => ['Could not sign you in with those details.']
                ]
            ], 422);
        }

        return (new PrivateUserResource(auth('api')->user()))
        	->additional([
        		'success' => true
        	]);

    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
            'password' => 'required',
        ]);
    }
}
