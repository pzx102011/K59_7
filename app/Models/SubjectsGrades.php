<?php

namespace App\Models;

use App\Enums\UserRoleEnum;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubjectsGrades extends Model
{
    use HasFactory;

    /** @return Collection<SubjectsGrades> */
    public static function getGradesAvailableForUser(User $user): Collection
    {
        $gradesBuilder = match (true) {
            $user->hasRole(UserRoleEnum::Administrator),
            $user->hasRole(UserRoleEnum::Headmaster) => self::getAllGrades(),
            $user->hasRole(UserRoleEnum::Tutor) => static::all(),
            $user->hasRole(UserRoleEnum::Parent) => static::all(),
            default => self::getPupilGrades($user)
        };

        return $gradesBuilder->get();
    }

    private static function getPupilGrades(User $user): Builder
    {
        return SubjectsGrades::query()
            ->where('pupil_id', '=', $user->id)
            ->orderBy('subjects_id')
        ;
    }

    private static function getTutorGrades(User $user): Builder
    {
        return SubjectsGrades::query()
            ->orderBy('subjects_id')
        ;
    }

    private static function getAllGrades(): Builder
    {
        return SubjectsGrades::query()
            ->orderBy('pupil_id')
        ;
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'pupil_id');
    }

    public function subject(): HasOne
    {
        return $this->hasOne(Subject::class, 'id', 'subjects_id');
    }
}
