<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrivateUserResource;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function action(Request $request)
    {
        return new PrivateUserResource(auth('api')->user());
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:3|max:255',
    		'email' => 'required|email|unique:users,email,'. auth()->id(),
    	]);

    	auth('api')->user()->update($request->only('name', 'email'));

        return (new PrivateUserResource(auth('api')->user()))
            ->additional([
                'success' => true,
                'type' => 'updateUser',
                'message' => 'Profile was updated successfully'
            ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
