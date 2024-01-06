<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class ParentsChildrenSeeder extends Seeder
{
    public function run(): void
    {
        $parents = User::all()->where('role_id', '=', Role::findByName(UserRoleEnum::Parent->value)->id);
        $pupils = User::all()->where('role_id', '=', Role::findByName(UserRoleEnum::Pupil->value)->id);

        foreach ($pupils as $pupil) {
            DB::table('family')->insert(
                [
                    ['pupil_id' => $pupil->id, 'parent_id' => $parents->random()->id],
                    ['pupil_id' => $pupil->id, 'parent_id' => $parents->random()->id],
                ]
            );
        }
    }
}
