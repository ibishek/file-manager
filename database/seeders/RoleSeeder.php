<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Role $role)
    {
        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();
        $role::create([
            'name' => 'admin'
        ]);
        $role::create([
            'name' => 'user'
        ]);
    }
}
