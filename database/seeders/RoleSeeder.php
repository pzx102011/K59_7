<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Dyrektor'])
            ->givePermissionTo(
                [
                    'add-all-grades',
                    'modify-all-grades',
                    'view-all-grades',
                ]
            )
        ;

        Role::create(['name' => 'Nauczyciel'])
            ->givePermissionTo(
                [
                    'add-own-subject-grades',
                    'modify-own-subject-grades',
                    'view-own-subject-grades',
                ]
            )
        ;

        Role::create(['name' => 'Rodzic'])
            ->givePermissionTo(
                [
                    'view-assigned-pupil-grades',
                ]
            )
        ;

        Role::create(['name' => 'Uczeń'])
            ->givePermissionTo(
                [
                    'view-own-grades',
                ]
            )
        ;
    }
}
