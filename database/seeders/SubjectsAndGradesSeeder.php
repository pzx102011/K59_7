<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Subject;
use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

use function rand;

class SubjectsAndGradesSeeder extends Seeder
{
    public function run(): void
    {
        $pupils = User::all()->where('role_id', '=', Role::findByName(UserRoleEnum::Pupil->value)->id);
        $tutors = User::all()->where('role_id', '=', Role::findByName(UserRoleEnum::Tutor->value)->id);

        $subjectNames = ['Matematyka', 'Biologia', 'Technika', 'Informatyka', 'Chemia', 'WF', 'Fizyka'];

        $newSubjectsData = [];

        foreach ($subjectNames as $subjectName) {
            $newSubjectsData[] = [
                'name' => $subjectName,
                'tutor_id' => $tutors->random()->id,
            ];
        }

        DB::table('subjects')->insert($newSubjectsData);

        $subjects = Subject::all();
        $gradesData = [];

        $currentDate = new DateTime('now');

        for ($i = 0; $i < 100; $i++) {
            $subject = $subjects->random();

            $gradesData[] = [
                'grade' => rand(1, 6),
                'subjects_id' => $subject->id,
                'pupil_id' => $pupils->random()->id,
                'tutor_id' => $subject->tutor->id,
                'created_at' => $currentDate,
            ];
        }

        DB::table('subjects_grades')->insert($gradesData);
    }
}
