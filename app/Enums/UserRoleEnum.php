<?php

declare(strict_types=1);

namespace App\Enums;

enum UserRoleEnum: string
{
    case Administrator = 'Administrator';
    case Headmaster = 'Dyrektor';
    case Tutor = 'Nauczyciel';
    case Parent = 'Rodzic';
    case Pupil = 'Uczeń';
}
