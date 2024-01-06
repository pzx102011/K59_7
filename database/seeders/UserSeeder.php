<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create(
            [
                'name' => 'Jerzy Listewnik',
                'email' => 'pzx102011@student.poznan.merito.pl',
                'password' => Hash::make('testowehaselko'),
                'created_at' => new DateTime('now'),
                'role_id' => Role::findByName(UserRoleEnum::Administrator->value)->id,
            ]
        )
            ->assignRole(UserRoleEnum::Administrator)
        ;

        User::create(
            [
                'name' => 'Jakub Lewandowski',
                'email' => 'pzx100025@student.poznan.merito.pl',
                'password' => Hash::make('testowehaselko'),
                'created_at' => new DateTime('now'),
                'role_id' => Role::findByName(UserRoleEnum::Headmaster->value)->id,
            ]
        )
            ->assignRole(UserRoleEnum::Headmaster)
        ;

        User::create(
            [
                'name' => 'Tomasz Nowacki',
                'email' => 'tomasz.nowacki@poznan.merito.pl',
                'password' => Hash::make('testowehaselko'),
                'created_at' => new DateTime('now'),
                'role_id' => Role::findByName(UserRoleEnum::Tutor->value)->id,
            ]
        )
            ->assignRole(UserRoleEnum::Tutor)
        ;
        User::create(
            [
                'name' => 'Mirosław Szyper',
                'email' => 'miroslaw.szyper@poznan.merito.pl',
                'password' => Hash::make('testowehaselko'),
                'created_at' => new DateTime('now'),
                'role_id' => Role::findByName(UserRoleEnum::Parent->value)->id,
            ]
        )
            ->assignRole(UserRoleEnum::Parent)
        ;

        User::create(
            [
                'name' => 'Janusz Testowy',
                'email' => 'testowyuczen@poznan.merito.pl',
                'password' => Hash::make('testowehaselko'),
                'created_at' => new DateTime('now'),
                'role_id' => Role::findByName(UserRoleEnum::Pupil->value)->id,
            ]
        )
            ->assignRole(UserRoleEnum::Pupil)
        ;

        User::create(
            [
                'name' => 'Zygmunt Testowy',
                'email' => 'foobar@poznan.merito.pl',
                'password' => Hash::make('testowehaselko'),
                'created_at' => new DateTime('now'),
                'role_id' => Role::findByName(UserRoleEnum::Pupil->value)->id,
            ]
        )->assignRole(UserRoleEnum::Pupil);

        User::create(
            [
                'name' => 'Hermenegilda Testowa',
                'email' => 'pzx99981@student.poznan.merito.pl',
                'password' => Hash::make('testowehaselko'),
                'created_at' => new DateTime('now'),
                'role_id' => Role::findByName(UserRoleEnum::Pupil->value)->id,
            ]
        )->assignRole(UserRoleEnum::Pupil);

        User::create(
            [
                'name' => 'Zdzisław Belfer',
                'email' => 'tnauczyciel@student.poznan.merito.pl',
                'password' => Hash::make('testowehaselko'),
                'created_at' => new DateTime('now'),
                'role_id' => Role::findByName(UserRoleEnum::Tutor->value)->id,
            ]
        )->assignRole(UserRoleEnum::Tutor);

        User::create(
            [
                'name' => 'Tadeusz Belfer',
                'email' => 'tbelfer@student.poznan.merito.pl',
                'password' => Hash::make('testowehaselko'),
                'created_at' => new DateTime('now'),
                'role_id' => Role::findByName(UserRoleEnum::Tutor->value)->id,
            ]
        )->assignRole(UserRoleEnum::Tutor);
    }
}
