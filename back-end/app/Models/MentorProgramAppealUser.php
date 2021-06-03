<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MentorProgramAppealUser extends Pivot
{
    protected $table = 'mentor_program_user';

    protected $fillable = [
        'mentor_program_id',
        'user_id',
        'answers'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
