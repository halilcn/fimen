<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'deadline',
        'questions'
    ];

    protected $casts = [
        'deadline' => 'date',
        'questions' => 'array'
    ];

    public function mentorUser(): BelongsTo
    {
        return $this->belongsTo(Mentor::class, 'mentor_id', 'id');
    }
}
