<?php

namespace App\Policies;

use App\Models\MentorProgram;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MentorProgramPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy(User $user, MentorProgram $mentorProgram)
    {
        return $user->id === $mentorProgram->mentor_id;
    }
}
