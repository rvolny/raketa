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
        /*
         * Roles
         */

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

        /*
         * Permissions
         */

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
        Permission::create([
            'name'       => 'courier_create',
            'guard_name' => 'api',
        ])->syncRoles([$roleAdmin, $roleUser]);

        // Permissions for Package
        Permission::create([
            'name'       => 'package_create',
            'guard_name' => 'api',
        ])->syncRoles([$roleAdmin, $roleSender]);

        Permission::create([
            'name'       => 'package_read',
            'guard_name' => 'api',
        ])->syncRoles([$roleAdmin, $roleUser]);

        Permission::create([
            'name'       => 'package_accept',
            'guard_name' => 'api',
        ])->syncRoles([$roleAdmin, $roleCourier]);

        // Permissions for Message
        Permission::create([
            'name'       => 'message_create',
            'guard_name' => 'api',
        ])->syncRoles([$roleAdmin, $roleUser]);

        Permission::create([
            'name'       => 'conversation_read',
            'guard_name' => 'api',
        ])->syncRoles([$roleAdmin, $roleUser]);
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
