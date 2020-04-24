<?php

namespace App\Http\Controllers\Agent;

use App\Http\Resources\Auth\SocietyResources;
use App\Http\Requests\StoreSocietyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Society;

class AccountController extends Controller
{
    public function index(Request $request)
    {
    	return new SocietyResources(
    		$request->user()->society
    	);
    }

    public function store(StoreSocietyRequest $request)
    {

    	$request->user()->society()->update([
    		'first' => $request->first_name,
    		'last' => $request->last_name,
    		'id_code' => $request->id_number,
    		'id_code_type' => $request->id_type,
    		'dob' => $request->dob,
    		'gender' => $request->gender,
    		'age' => $request->age,
    		'phone' => $request->phone,
    		'status' => 'Pending'
    	]);

    	return new SocietyResources(
    		$request->user()->society
    	);
    }
}
