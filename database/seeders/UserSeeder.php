<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use function sprintf;
use function str_replace;
use function strtolower;

class UserSeeder extends Seeder
{

    public function __construct(
        private string $password = 'testowehaselko',
        private DateTime $createdDate = new DateTime('now'),
    ) {
    }

    public function run(): void
    {
        $admin = Role::findByName(UserRoleEnum::Administrator->value);
        $headmaster = Role::findByName(UserRoleEnum::Headmaster->value);
        $tutor = Role::findByName(UserRoleEnum::Tutor->value);
        $parent = Role::findByName(UserRoleEnum::Parent->value);
        $pupil = Role::findByName(UserRoleEnum::Pupil->value);

        $data = [
            ['name' => 'Jerzy Listewnik', 'email' => 'pzx102011@student.poznan.merito.pl', 'role' => $admin],

            ['name' => 'Jakub Lewandowski', 'email' => 'pzx100025@student.poznan.merito.pl', 'role' => $headmaster],

            ['name' => 'Tomasz Nowacki', 'role' => $tutor],
            ['name' => 'Usain Bolt', 'role' => $tutor],
            ['name' => 'Andrzej Gołota', 'role' => $tutor],
            ['name' => 'Iga Świątek', 'role' => $tutor],

            ['name' => 'Mirosław Szyper', 'role' => $parent],
            ['name' => 'Paloma Zając', 'role' => $parent],
            ['name' => 'Zdzisława Brzęczyszczykiewicz', 'role' => $parent],
            ['name' => 'Aldona Zgrzytozgryz', 'role' => $parent],
            ['name' => 'Tadeusz Wyliniały', 'role' => $parent],
            ['name' => 'Andrzej Przeciąg', 'role' => $parent],
            ['name' => 'Herman Altdorf', 'role' => $parent],

            ['name' => 'Brian May', 'role' => $pupil],
            ['name' => 'Bruce Dickinson', 'role' => $pupil],
            ['name' => 'Rob Halford', 'role' => $pupil],
            ['name' => 'James Hetfield', 'role' => $pupil],
            ['name' => 'Joe Satriani', 'role' => $pupil],
            ['name' => 'Floor Jansen', 'role' => $pupil],
        ];

        foreach ($data as $item) {
            User::create(
                [
                    'name' => $item['name'],
                    'email' => $item['email'] ?? $this->createEmailFromName($item['name']),
                    'password' => Hash::make($this->password),
                    'created_at' => $this->createdDate,
                    'role_id' => $item['role']->id,
                ]
            )
                ->assignRole($item['role'])
            ;
        }
    }

    private function createEmailFromName(string $name): string
    {
        return sprintf(
            '%s@poznan.merito.pl',
            strtolower(str_replace(' ', '.', $name))
        );
    }
}
