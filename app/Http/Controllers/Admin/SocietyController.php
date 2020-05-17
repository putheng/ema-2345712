<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\SocietyResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SocietyController extends Controller
{
    public function index()
    {
    	return SocietyResource::collection(
    		User::isSociety()->paginate(30)
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

    	return SocietyResource::collection(
    		User::isSociety()->paginate(30)
    	)->additional([
    		'success' => true,
    	]);
    }
}
