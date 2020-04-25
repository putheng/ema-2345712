<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = [
    		['name' => 'admin'],
        	['name' => 'supper admin'],
            ['name' => 'customer'],
        	['name' => 'society'],
        	['name' => 'store']
        ];

        collect($roles)->each(function($role){
        	Role::create($role);
        });

        $permissions = [
        	['name' => 'create store'],
        	['name' => 'update store'],
        	['name' => 'delete store'],
        	['name' => 'approve product']
        ];

        collect($permissions)->each(function($permission){
        	Permission::create($permission);
        });
    }
}
