<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    //? uzun
    public function mentee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
