<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PasswordStoreRequest;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function store(PasswordStoreRequest $request)
    {
        auth('api')->user()->update([
            'password' => bcrypt($request->password)
        ]);
        
        return response()->json([
        	'success' => true,
        	'message' => 'Password successfully changed'
        ]);
    }
}
