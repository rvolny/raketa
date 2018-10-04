<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $roleAdmin = Role::create([
            'name'       => 'admin',
            'guard_name' => 'api',
        ]);
        $roleSender = Role::create([
            'name'       => 'sender',
            'guard_name' => 'api',
        ]);
        $roleCourier = Role::create([
            'name'       => 'courier',
            'guard_name' => 'api',
        ]);

        // Package permissions
        $permission = Permission::create([
            'name'       => 'package_list_all',
            'guard_name' => 'api',
        ]);
        $roleAdmin->givePermissionTo($permission);

        $permission = Permission::create([
            'name'       => 'package_add',
            'guard_name' => 'api',
        ]);
        $roleAdmin->givePermissionTo($permission);
        $roleSender->givePermissionTo($permission);
    }
}
