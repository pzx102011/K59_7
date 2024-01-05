<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'administrator',
            'add-all-grades',
            'modify-all-grades',
            'view-all-grades',
            'add-own-subject-grades',
            'modify-own-subject-grades',
            'view-own-subject-grades',
            'view-assigned-pupil-grades',
            'view-own-grades',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
