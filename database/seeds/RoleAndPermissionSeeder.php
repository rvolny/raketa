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


        // Permissions for User

        // Permissions for Sender

        // Permissions for Courier

        // Permissions for Package

        // Permissions for Message
        $permission = Permission::create([
            'name'       => 'message_read',
            'guard_name' => 'api',
        ]);
        $roleAdmin->givePermissionTo($permission);
        $roleSender->givePermissionTo($permission);
        $roleCourier->givePermissionTo($permission);

        $permission = Permission::create([
            'name'       => 'message_create',
            'guard_name' => 'api',
        ]);
        $roleAdmin->givePermissionTo($permission);
        $roleSender->givePermissionTo($permission);
        $roleCourier->givePermissionTo($permission);

        // Permissions for Wallet


        // TODO: delete below me

        // User permission
        $permission = Permission::create([
            'name'       => 'user_read',
            'guard_name' => 'api',
        ]);
        $roleAdmin->givePermissionTo($permission);
        $roleSender->givePermissionTo($permission);
        $roleCourier->givePermissionTo($permission);

        // Package permissions
        $permission = Permission::create([
            'name'       => 'package_read_all',
            'guard_name' => 'api',
        ]);
        $roleAdmin->givePermissionTo($permission);

        $permission = Permission::create([
            'name'       => 'package_create',
            'guard_name' => 'api',
        ]);
        $roleAdmin->givePermissionTo($permission);
        $roleSender->givePermissionTo($permission);
    }
}
