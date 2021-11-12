<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        // create roles and assign created permissions
        Role::create(['name' => config('access.role.admin')]);        
        Role::create(['name' => config('access.role.customer_service')]);
        Role::create(['name' => config('access.role.manufacturer')]);
        Role::create(['name' => config('access.role.customer')]);    
    }
}