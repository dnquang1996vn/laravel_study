<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'user-management']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);

        /** @var Role $role2 */
        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('user-management');

        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = Factory(App\User::class)->create([
            'name' => 'Example User',
            'email' => 'user@example.com',
        ]);
        $user->assignRole($role1);

        $user = Factory(App\User::class)->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        $user = Factory(App\User::class)->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role3);
    }
}
