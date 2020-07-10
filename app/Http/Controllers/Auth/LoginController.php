<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\PrivateUserResource;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function action(LoginRequest $request)
    {
        if (!$token = auth('api')->attempt($request->only('email', 'password'))) {
            return response()->json([
                'errors' => [
                    'email' => ['Could not sign you in with those details.']
                ]
            ], 422);
        }

        return (new PrivateUserResource(auth('api')->user()))
            ->additional([
                'meta' => [
                    'token' => $token
                ]
            ]);
    }
}
