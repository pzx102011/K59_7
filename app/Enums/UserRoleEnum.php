<?php

declare(strict_types=1);

namespace App\Enums;

enum UserRoleEnum: int
{
    case Administrator = 1;
    case Headmaster = 2;
    case Tutor = 3;
    case Parent = 4;
    case Pupil = 5;
}
