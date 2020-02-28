<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolePermissionRequest;
use App\Http\Resources\RolePermissionResuorce;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function show(Request $request, Role $role)
    {
    	return new RolePermissionResuorce($role);
    }

    public function update(RolePermissionRequest $request, Role $role)
    {
    	$role->syncPermissions($request->permissions);

    	return response()->json([
    		'success' => true,
    		'message' => 'Permission attached'
    	]);
    }
}
