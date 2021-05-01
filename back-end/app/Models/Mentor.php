<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mentor extends Model
{
    use HasFactory;

    protected $table = 'mentors';
    protected $fillable = [
        'user_id',
        'competency_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function competency(): BelongsTo
    {
        return $this->belongsTo(Competence::class);
    }

    public function programs(): HasMany
    {
        return $this->hasMany(MentorProgram::class);
    }

}
