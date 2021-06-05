<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorMentee extends Model
{
    use HasFactory;

    protected $table = 'mentor_mentee';

    protected $fillable = [
        'mentor_id',
        'user_id'
    ];
}
