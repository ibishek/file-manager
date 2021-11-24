<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Permission $permission)
    {
        $permissions = [
            'fileowner_create',
            'fileowner_edit',
            'fileowner_delete',
            'file_create',
            'file_edit',
            'file_delete',
            'fileprogress_create',
            'fileprogress_edit',
            'filingcabinet_create',
            'filingcabinet_edit',
            'filingcabinet_delete',
            'staff_create',
            'staff_edit',
            'staff_show',
            'staff_delete',
            'setting_update'
        ];
        array_walk(
            $permissions,
            fn ($perms) => $permission::create(['name' => $perms]) //please, do not put s before perms
        );
    }
}
