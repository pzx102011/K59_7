<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create(
            [
                [
                    'name' => 'jlistewnik',
                    'email' => 'pzx102011@student.poznan.merito.pl',
                    'password' => Hash::make('testowehaselko'),
                    'created_at' => new DateTime('now'),
                    'role_id' => UserRoleEnum::Administrator,
                ],
                [
                    'name' => 'jlewandowski',
                    'email' => 'pzx100025@student.poznan.merito.pl',
                    'password' => Hash::make('testowehaselko'),
                    'created_at' => new DateTime('now'),
                    'role_id' => UserRoleEnum::Headmaster,
                ],
                [
                    'name' => 'tnowacki',
                    'email' => 'tomasz.nowacki@poznan.merito.pl',
                    'password' => Hash::make('testowehaselko'),
                    'created_at' => new DateTime('now'),
                    'role_id' => UserRoleEnum::Parent,
                ],
                [
                    'name' => 'mszyper',
                    'email' => 'miroslaw.szyper@poznan.merito.pl',
                    'password' => Hash::make('testowehaselko'),
                    'created_at' => new DateTime('now'),
                    'role_id' => UserRoleEnum::Pupil,
                ],
                [
                    'name' => 'ttestowy',
                    'email' => 'testowyuczen@poznan.merito.pl',
                    'password' => Hash::make('testowehaselko'),
                    'created_at' => new DateTime('now'),
                    'role_id' => UserRoleEnum::Pupil,
                ],
                [
                    'name' => 'fbar',
                    'email' => 'foobar@poznan.merito.pl',
                    'password' => Hash::make('testowehaselko'),
                    'created_at' => new DateTime('now'),
                    'role_id' => UserRoleEnum::Pupil,
                ],
                [
                    'name' => 'wkubaczyk',
                    'email' => 'pzx99981@student.poznan.merito.pl',
                    'password' => Hash::make('testowehaselko'),
                    'created_at' => new DateTime('now'),
                    'role_id' => UserRoleEnum::Tutor,
                ],
                [
                    'name' => 'tnauczyciel',
                    'email' => 'tnauczyciel@student.poznan.merito.pl',
                    'password' => Hash::make('testowehaselko'),
                    'created_at' => new DateTime('now'),
                    'role_id' => UserRoleEnum::Tutor,
                ],
                [
                    'name' => 'tbelfer',
                    'email' => 'tbelfer@student.poznan.merito.pl',
                    'password' => Hash::make('testowehaselko'),
                    'created_at' => new DateTime('now'),
                    'role_id' => UserRoleEnum::Tutor,
                ],
            ]
        );
    }
}
