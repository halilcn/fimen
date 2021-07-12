<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MentorMenteeProgram extends Model
{
    use HasFactory;

    protected $table = 'mentor_mentee';

    protected $fillable = [
        'mentor_id',
        'user_id',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class);
    }

    public function mentee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(MentorMenteeNotification::class, 'mentor_mentee_id', 'id');
    }


}
