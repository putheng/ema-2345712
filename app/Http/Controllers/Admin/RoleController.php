<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\StoreUpRoleRequest;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function index()
    {
    	return RoleResource::collection(
    		Role::get()
    	);
    }

    public function show(Request $request, Role $role)
    {
    	return new RoleResource($role);
    }

    public function store(StoreRoleRequest $request)
    {
    	Role::create($request->only('name'));

    	return RoleResource::collection(
    		Role::get()
    	);
    }

    public function update(StoreUpRoleRequest $request, Role $role)
    {
    	$role->update($request->only('name'));

    	return response()->json([
    		'success' => true,
    		'message' => 'Role update successfully'
    	]);
    }
}
