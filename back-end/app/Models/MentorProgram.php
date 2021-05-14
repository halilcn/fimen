<?php

namespace App\Models;

use App\Events\MentorProgramSaved;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'questions' => 'array'
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

    public function mentorUser(): BelongsTo
    {
        return $this->belongsTo(Mentor::class, 'mentor_id', 'id');
    }

}
