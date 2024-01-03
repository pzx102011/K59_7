<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function rand;

class SubjectsAndGradesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('subjects')
            ->insert(
                [
                    ['name' => 'Matematyka', 'tutor_id' => rand(7, 9)],
                    ['name' => 'Biologia', 'tutor_id' => rand(7, 9)],
                    ['name' => 'Technika', 'tutor_id' => rand(7, 9)],
                    ['name' => 'Informatyka', 'tutor_id' => rand(7, 9)],
                    ['name' => 'Chemia', 'tutor_id' => rand(7, 9)],
                ]
            )
        ;

        $grades = [];

        $currentDate = new DateTime('now');

        for ($i = 0; $i < 500; $i++) {
            $grades[] = [
                'grade' => rand(1, 6),
                'subjects_id' => rand(1, 5),
                'pupil_id' => rand(4, 6),
                'created_at' => $currentDate,
            ];
        }

        DB::table('subjects_grades')->insert($grades);
    }
}
