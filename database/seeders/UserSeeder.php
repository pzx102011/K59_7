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
                'name' => 'jlistewnik',
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
                'name' => 'jlewandowski',
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
                'name' => 'tnowacki',
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
                'name' => 'mszyper',
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
                'name' => 'ttestowy',
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
                'name' => 'fbar',
                'email' => 'foobar@poznan.merito.pl',
                'password' => Hash::make('testowehaselko'),
                'created_at' => new DateTime('now'),
                'role_id' => Role::findByName(UserRoleEnum::Pupil->value)->id,
            ]
        )->assignRole(UserRoleEnum::Pupil);

        User::create(
            [
                'name' => 'wkubaczyk',
                'email' => 'pzx99981@student.poznan.merito.pl',
                'password' => Hash::make('testowehaselko'),
                'created_at' => new DateTime('now'),
                'role_id' => Role::findByName(UserRoleEnum::Pupil->value)->id,
            ]
        )->assignRole(UserRoleEnum::Pupil);

        User::create(
            [
                'name' => 'tnauczyciel',
                'email' => 'tnauczyciel@student.poznan.merito.pl',
                'password' => Hash::make('testowehaselko'),
                'created_at' => new DateTime('now'),
                'role_id' => Role::findByName(UserRoleEnum::Tutor->value)->id,
            ]
        )->assignRole(UserRoleEnum::Tutor);

        User::create(
            [
                'name' => 'tbelfer',
                'email' => 'tbelfer@student.poznan.merito.pl',
                'password' => Hash::make('testowehaselko'),
                'created_at' => new DateTime('now'),
                'role_id' => Role::findByName(UserRoleEnum::Tutor->value)->id,
            ]
        )->assignRole(UserRoleEnum::Tutor);
    }
}
