<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        // Permisos...
        // syncRoles= Permite varios roles,   assignRole=Asigna solo un rol.
        Permission::create(['name' => 'home'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'events'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'events.create'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'profile'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'crud-users.view'])->assignRole($admin);
        Permission::create(['name' => 'crud-users.edit'])->assignRole($admin);
        Permission::create(['name' => 'crud-users.delete'])->assignRole($admin);
        Permission::create(['name' => 'files'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'permission'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'statistics'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'projects'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'community'])->syncRoles([$admin, $user]);

    }
}
