<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subject extends Model
{
    use HasFactory;

    public function tutor(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'tutor_id');
    }
}
