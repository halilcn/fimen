<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorMenteeProgramNotification extends Model
{
    use HasFactory;

    protected $table = 'mentor_mentee_notifications';

    protected $fillable = [
        'mentor_mentee_id',
        'notification_type',
        'data'
    ];

    protected $casts = [
        'data' => 'json'
    ];
}
