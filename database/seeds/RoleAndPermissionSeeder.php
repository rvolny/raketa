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
        $roleAdmin = Role::create(['name' => 'admin',]);
        $roleSender = Role::create(['name' => 'sender',]);
        $roleCourier = Role::create(['name' => 'courier',]);

        // Package permissions
        $permission = Permission::create(['name' => 'package_list_all',]);
        $roleAdmin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'package_add',]);
        $roleAdmin->givePermissionTo($permission);
        $roleSender->givePermissionTo($permission);
    }
}
