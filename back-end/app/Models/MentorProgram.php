<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorProgram extends Model
{
    use HasFactory;

    protected $table = 'mentor_programs';
    protected $fillable = [
        'mentor_id',
        'title',
        'explanation',
        'slug',
        'mentee_count',
        'deadline'
    ];
}
