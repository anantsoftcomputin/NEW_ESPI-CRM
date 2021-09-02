<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // // create permissions
        $permissions = [
            'view-user',
            'create-user',
            'update-user',
            'destroy-user',
            'view-role',
            'view-permission',
            'create-role',
            'create-permission',
            'update-role',
            'update-permission',
            'destroy-role',
            'destroy-permission',
            'update-settings',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        // Create Super user & role
        $admin= Role::create(['name' => 'super-admin']);
        $admin->syncPermissions($permissions);

        $usr = User::find(1);

        $usr->assignRole($admin);

        $usr->syncPermissions($permissions);

        // Create user & role
        

    }
}
