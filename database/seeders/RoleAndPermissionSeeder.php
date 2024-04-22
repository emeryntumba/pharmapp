<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create-sell']);
        Permission::create(['name' => 'create-product']);

        $adminRole = Role::create(['name' => 'administrateur']);
        $caissierRole = Role::create(['name' => 'caissier']);

        $adminRole->givePermissionTo(Permission::all());
        $caissierRole->givePermissionTo(['create-sell', 'create-product']);
    }
}
