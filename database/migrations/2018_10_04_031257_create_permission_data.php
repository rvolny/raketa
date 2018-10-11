<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreatePermissionData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create roles
        $roleAdmin = Role::create([
            'name'       => 'admin',
            'guard_name' => 'api',
        ]);
        $roleUser = Role::create([
            'name'       => 'user',
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
        Permission::create([
            'name'       => 'user_read',
            'guard_name' => 'api',
        ])->syncRoles([$roleAdmin, $roleUser]);

        Permission::create([
            'name'       => 'user_update',
            'guard_name' => 'api',
        ])->syncRoles([$roleAdmin, $roleUser]);

        // Permissions for Wallet

        // Permissions for Sender
        Permission::create([
            'name'       => 'sender_create',
            'guard_name' => 'api',
        ])->syncRoles([$roleAdmin, $roleUser]);

        // Permissions for Courier

        // Permissions for Package
        Permission::create([
            'name'       => 'package_create',
            'guard_name' => 'api',
        ])->syncRoles([$roleAdmin, $roleSender]);

        // Permissions for Message
        Permission::create([
            'name'       => 'message_create',
            'guard_name' => 'api',
        ])->syncRoles([$roleAdmin, $roleUser]);

        Permission::create([
            'name'       => 'conversation_read',
            'guard_name' => 'api',
        ])->syncRoles([$roleAdmin, $roleUser]);


        // TODO: delete below me

        // Package permissions
        $permission = Permission::create([
            'name'       => 'package_read_all',
            'guard_name' => 'api',
        ]);
        $roleAdmin->givePermissionTo($permission);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
