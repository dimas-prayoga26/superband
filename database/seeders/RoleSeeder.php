<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $adminPanelPermission = Permission::findOrCreate('access admin panel', 'web');
        $votingPermission = Permission::findOrCreate('access voting', 'web');

        foreach (['admin', 'panitia', 'juri'] as $roleName) {
            Role::findOrCreate($roleName, 'web')->givePermissionTo($adminPanelPermission);
        }

        Role::findOrCreate('voter', 'web')->givePermissionTo($votingPermission);

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
