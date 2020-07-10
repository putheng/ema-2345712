<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\PrivateUserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
	use RegistersUsers;

    public function store(RegisterRequest $request)
    {
        $user = User::create($request->only('email', 'name', 'password'));

        $user->customer()->create([
            'phone' => $request->phone
        ]);

        $this->guard()->login($user);

        $user->update(['type' => 'dashboard']);
        $user->assignRole('customer');

        return (new PrivateUserResource($user))
        	->additional([
        		'success' => true
        	]);
    }
}
