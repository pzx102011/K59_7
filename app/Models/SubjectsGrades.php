<?php

namespace App\Models;

use App\Enums\UserRoleEnum;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubjectsGrades extends Model
{
    use HasFactory;

    public static function getGradesAvailableForUser(User $user): Builder
    {
        $gradesBuilder = match (true) {
            $user->hasRole(UserRoleEnum::Administrator),
            $user->hasRole(UserRoleEnum::Headmaster) => self::getAllGrades(),
            $user->hasRole(UserRoleEnum::Tutor) => self::getTutorGrades($user),
            $user->hasRole(UserRoleEnum::Parent) => self::getParentChildrenGrades($user),
            default => self::getPupilGrades($user)
        };

        return $gradesBuilder;
    }

    private static function getParentChildrenGrades(User $parent): Builder
    {
        $childrenIds = $parent->children()->get()->modelKeys();

        return SubjectsGrades::query()
            ->whereIn('pupil_id', $childrenIds)
            ->orderBy('pupil_id')
            ->orderBy('subject_id')
        ;
    }

    private static function getPupilGrades(User $pupil): Builder
    {
        return SubjectsGrades::query()
            ->where('pupil_id', '=', $pupil->id)
            ->orderBy('subject_id')
        ;
    }

    private static function getTutorGrades(User $tutor): Builder
    {
        $availableSubjectIds = $tutor->subjects()->get()->modelKeys();

        return SubjectsGrades::query()
            ->whereIn('subject_id', $availableSubjectIds)
            ->orderBy('subject_id')
        ;
    }

    private static function getAllGrades(): Builder
    {
        return SubjectsGrades::query()
            ->orderBy('pupil_id')
        ;
    }

    public function pupil(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pupil_id', 'id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function tutor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'tutor_id', 'id');
    }
}
