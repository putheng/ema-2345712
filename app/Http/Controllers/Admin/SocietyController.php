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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
    		'phone' => 'required',
    	]);

        $user->society()->update([
            'first' => $request->first_name,
            'last' => $request->last_name,
            'phone' => $request->phone,
        ]);

    	$user->update([
    		'email' => $request->email
    	]);

    	return response()->json([
    		'success' => true,
    		'message' => 'Society updated successfully.'
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
