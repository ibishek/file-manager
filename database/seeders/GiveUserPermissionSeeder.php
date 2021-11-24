<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class GiveUserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'fileowner_create',
            'fileowner_edit',
            'file_create',
            'file_edit',
            'filingcabinet_edit',
        ];
        $userRole = Role::findByName('user');
        $userRole->givePermissionTo($permissions);
        // see AuthServiceProvider for super admin i.e. admin roles
        // see docx => https://spatie.be/docs/laravel-permission/v5/basic-usage/super-admin
    }
}
