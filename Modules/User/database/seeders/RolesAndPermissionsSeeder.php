<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use LDAP\Result;
use Modules\User\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permissions list
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        # Permissions list
        $permissions = [
            [
                'group_name' => 'User',
                'permissions' => [
                    'user_read',
                    'user_create',
                    'user_update',
                    'user_delete',
                ],
            ],
        ];

        # Create permissions
        foreach ($permissions as $permission) {
            foreach ($permission['permissions'] as $permission_name) {
                Permission::create([
                    'name' => $permission_name,
                    'group_name' => $permission['group_name'],
                ]);
            }
        }

        # Create roles
        $roles = ['admin', 'student', 'instructor'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        # Admin Role Assign Permissions
        Role::findByName('admin')->givePermissionTo(Permission::all());

        $admin = User::where('email', 'admin@gmail.com')->first();
        if (!$admin) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
            ]);

            $admin->assignRole('admin');
        }

        Role::findByName('student')->givePermissionTo([
            'user_read',
        ]);

        Role::findByName('instructor')->givePermissionTo([
            'user_read',
        ]);
    }
}