<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'writer', 'editor', 'viewer'];
        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['name' => $role],
                ['guard_name' => 'web']
            );
        }

        $permissions = ['edit','delete','view','create'];
        foreach($permissions as $permission){
            Permission::firstOrCreate(
                ['name' => $permission],
                ['guard_name' => 'web'],
            );
        }
    }
}
