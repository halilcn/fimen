<?php

namespace App\Models;

use App\Events\MentorProgramSaved;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

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
        'questions' => 'array',
        'usersAppeal.appeal.answers' => 'array'
    ];

    protected $dispatchesEvents = [
        'saved' => MentorProgramSaved::class
    ];

    // Filter Scope
    public function scopeWithFilters($query, Request $request): void
    {
        $query->when(
            $request->filled('competencies'),
            function (Builder $query) use ($request) {
                $query->whereHas(
                    'mentorUser',
                    function (Builder $query) use ($request) {
                        $query->whereIn('competency_id', $request->input('competencies'));
                    }
                );
            }
        )
            ->when(
                $request->input('lastProgramDeadline', 'now') != 'now',
                function (Builder $query) use ($request) {
                    $query->whereDate('deadline', '>', $request->input('lastProgramDeadline'));
                },
                function (Builder $query) {
                    $query->whereDate('deadline', '>', now());
                }
            );
    }

    public function isApplied(int $userId): bool
    {
        return $this->usersAppeal()->where('user_id', $userId)->exists();
    }

    public function mentorUser(): BelongsTo
    {
        return $this->belongsTo(Mentor::class, 'mentor_id', 'id');
    }

    public function usersAppeal(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'mentor_program_user', 'mentor_program_id', 'user_id')
            ->as('appeal')
            ->withPivot('answers')
            ->withTimestamps()
            ->using(MentorProgramAppealUser::class);
    }
}
