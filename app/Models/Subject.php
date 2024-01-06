<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subject extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'tutor_id'];

    public function tutor(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'tutor_id');
    }
}
