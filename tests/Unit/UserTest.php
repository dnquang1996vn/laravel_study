<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $permission = Permission::create(['name' => 'user manager']);
        /** @var Role $role1 */
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'super-admin']);
        $role1->givePermissionTo($permission->name);
        app(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();

    }

    public function test_get_permission_via_role()
    {
        /** @var User $user */
        $user = factory(User::class)->create();
        $user->assignRole('admin');

        $this->assertTrue($user->hasRole('admin'));
        $this->assertTrue($user->hasPermissionTo('user manager'));
        $this->assertTrue($user->can('user manager'));
    }

    public function test_get_direct_permission()
    {
        /** @var User $user */
        $user = factory(User::class)->create();
        $user->givePermissionTo('user manager');

        $this->assertTrue($user->hasPermissionTo('user manager'));
        $this->assertTrue($user->can('user manager'));
    }

    public function test_supper_admin_get_all_permission()
    {
        /** @var User $user */
        $user = factory(User::class)->create();
        $user->assignRole('super-admin');

        $this->assertFalse($user->hasPermissionTo('user manager'));
        $this->assertTrue($user->can('user manager'));
    }

}
