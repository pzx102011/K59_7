<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_roles')->insert(
            [
                ['id' => 1, 'name' => 'Administrator'],
                ['id' => 2, 'name' => 'Dyrektor'],
                ['id' => 3, 'name' => 'Nauczyciel'],
                ['id' => 4, 'name' => 'Rodzic'],
                ['id' => 5, 'name' => 'Uczeń'],
            ]
        );
    }
}
