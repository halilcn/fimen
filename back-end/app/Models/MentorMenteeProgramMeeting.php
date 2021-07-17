<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorMenteeProgramMeeting extends Model
{
    use HasFactory;

    protected $table = 'mentor_mentee_meeting';

    protected $fillable = [
        'mentor_mentee_program_id',
        'address',
        'explanation',
        'date'
    ];
}
