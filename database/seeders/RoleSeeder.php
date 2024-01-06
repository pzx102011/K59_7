<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'Administrator'])
            ->givePermissionTo(
                [
                    'administrator',
                    'manage-users',
                    'add-grades',
                    'modify-grades',
                    'view-grades',
                ]
            )
        ;
        Role::create(['name' => 'Dyrektor'])
            ->givePermissionTo(
                [
                    'modify-grades',
                    'view-grades',
                ]
            )
        ;

        Role::create(['name' => 'Nauczyciel'])
            ->givePermissionTo(
                [
                    'add-grades',
                    'modify-grades',
                    'view-grades',
                ]
            )
        ;

        Role::create(['name' => 'Rodzic'])
            ->givePermissionTo(
                [
                    'view-grades',
                ]
            )
        ;

        Role::create(['name' => 'Uczeń'])
            ->givePermissionTo(
                [
                    'view-grades',
                ]
            )
        ;
    }
}
