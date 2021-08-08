<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorMenteeProgramMessage extends Model
{
    use HasFactory;

    protected $table = 'mentor_mentee_messages';
    protected $fillable = [
        'mentor_mentee_id',
        'from_user_id',
        'to_user_id',
        'message_type',
        'message',
        'deleted_by_users_id'
    ];

    protected $casts = [
        'deleted_by_users_id' => 'array'
    ];
}
