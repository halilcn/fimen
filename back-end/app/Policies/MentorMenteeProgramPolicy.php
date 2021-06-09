<?php

namespace App\Policies;

use App\Models\MentorMenteeProgram;
use App\Models\MentorProgram;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MentorMenteeProgramPolicy
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

    /**
     * @param  User  $user
     * @param  MentorMenteeProgram  $program
     * @return bool
     */
    public function create(User $user): bool
    {
        return true;
        return $user->isProgramOwner($program->mentor_id);
    }
}
