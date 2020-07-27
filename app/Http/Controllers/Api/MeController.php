<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrivateUserResource;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function action(Request $request)
    {
        return new PrivateUserResource($request->user());
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:3|max:255',
    		'email' => 'required|email|unique:users,email,'. auth()->id(),
    	]);

    	$request->user()->update($request->only('name', 'email'));

        return (new PrivateUserResource($request->user()))
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

    public function applogout()
    {
        auth()->logout();

        return redirect('/home');
    }
}
