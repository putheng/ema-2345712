<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
    	return UserResource::collection(
    		User::paginate(30)
    	);
    }

    public function update(Request $request, User $user)
    {
    	$this->validate($request, [
    		'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
    	]);

    	$user->update([
    		'password' => bcrypt($request->password)
    	]);

    	return response()->json([
    		'success' => true,
    		'message' => 'Password update successfully.'
    	]);
    }

    public function destroy(Request $request, User $user)
    {
    	$user->delete();

    	return UserResource::collection(
    		User::isCustomer()->paginate(30)
    	)->additional([
    		'success' => true,
            'message' => 'User deleted.'
    	]);
    }
}
