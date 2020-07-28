<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\SocietyResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agent;

class SocietyController extends Controller
{
    public function index()
    {
    	return SocietyResource::collection(
    		User::isSociety()->paginate(330)
    	);
    }

    public function filter(Request $request)
    {
        $agent = Agent::where('uuid', strtoupper($request->get('q', '')));

        if($agent->count()){
            return SocietyResource::collection(
                User::where('id', $agent->first()->user_id)->get()
            );
        }

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
