<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'manage roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);
        Permission::create(['name' => 'view roles']);

        // Create roles and assign permissions
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo(['view users']);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo([
            'manage users',
            'edit users',
            'delete users',
            'view users',
            'view roles'
        ]);

        $superAdminRole = Role::create(['name' => 'super-admin']);
        $superAdminRole->givePermissionTo(Permission::all());

        // Create default admin user
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);

        $admin->assignRole('super-admin');
    }
}
