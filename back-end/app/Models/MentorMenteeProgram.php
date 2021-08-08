<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use voku\helper\ASCII;

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
        return $this->hasMany(MentorMenteeProgramNotification::class, 'mentor_mentee_id', 'id');
    }

    public function meetings(): HasMany
    {
        return $this->hasMany(MentorMenteeProgramMeeting::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(MentorMenteeProgramMessage::class, 'mentor_mentee_id', 'id');
    }

    public function deleteRelationships(): void
    {
        $this->notifications()->delete();
        $this->meetings()->delete();
        $this->messages()->get()->each(function ($message) {
            $message->delete();
        });
    }

}
