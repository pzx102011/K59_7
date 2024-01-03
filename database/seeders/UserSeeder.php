<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'jlistewnik',
                    'email' => 'pzx102011@student.poznan.merito.pl',
                    'password' => Hash::make('testowehaselko'),
                    'created_at' => new DateTime('now'),
                    'role_id' => 1,
                ],
                [
                    'name' => 'jlewandowski',
                    'email' => 'pzx100025@student.poznan.merito.pl',
                    'password' => Hash::make('testowehaselko'),
                    'created_at' => new DateTime('now'),
                    'role_id' => 2,
                ],
                [
                    'name' => 'wkubaczyk',
                    'email' => 'pzx99981@student.poznan.merito.pl',
                    'password' => Hash::make('testowehaselko'),
                    'created_at' => new DateTime('now'),
                    'role_id' => 3,
                ],
                [
                    'name' => 'tnowacki',
                    'email' => 'tomasz.nowacki@poznan.merito.pl',
                    'password' => Hash::make('testowehaselko'),
                    'created_at' => new DateTime('now'),
                    'role_id' => 4,
                ],
                [
                    'name' => 'mszyper',
                    'email' => 'miroslaw.szyper@poznan.merito.pl',
                    'password' => Hash::make('testowehaselko'),
                    'created_at' => new DateTime('now'),
                    'role_id' => 5,
                ],
            ]
        );
    }
}
