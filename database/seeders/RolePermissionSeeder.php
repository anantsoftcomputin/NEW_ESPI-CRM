<?php

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
        // create permissions
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
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        // Create Super user & role
        $admin= Role::create(['name' => 'super-admin']);
        $admin->syncPermissions($permissions);

        $usr = User::create([
            'company_id' => 1,
            'name'=> 'Admin',
            'email' => 'admin@email.com',
            'password' => 'secret',
            'status' => true,
            'email_verified_at' => now(),
        ]);

        $usr->assignRole($admin);

        $usr->syncPermissions($permissions);

        // Create user & role
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('update-settings');
        $role->givePermissionTo('view-user');

        $user = User::create([
            'company_id' => 1,
            'name'=> 'User',
            'email' => 'user@email.com',
            'password' => 'secret',
            'status' => true,
            'email_verified_at' => now(),
        ]);
        $user->assignRole($role);

        $role = Role::create(['name' => 'employe']);
        $role->givePermissionTo('create-task');
        $role->givePermissionTo('view-task');

        $user = User::create([
            'company_id' => 1,
            'name'=> 'employe',
            'email' => 'employe@email.com',
            'password' => 'secret',
            'status' => true,
            'email_verified_at' => now(),
        ]);
        $user->assignRole($role);

        $role = Role::create(['name' => 'client']);
        $role->givePermissionTo('create-task');
        $role->givePermissionTo('view-task');

        $user = User::create([
            'company_id' => 1,
            'name'=> 'Client',
            'email' => 'client@email.com',
            'password' => 'secret',
            'status' => true,
            'email_verified_at' => now(),
        ]);
        $user->assignRole($role);
    }
}
