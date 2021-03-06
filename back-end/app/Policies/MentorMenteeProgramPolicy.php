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
     * @param  MentorProgram  $program
     * @return bool
     */
    public function create(User $user, MentorProgram $mentorProgram): bool
    {
        return $user->isProgramOwner($mentorProgram->mentor_id);
    }

    /**
     * @param  User  $user
     * @param  MentorMenteeProgram  $program
     * @return bool
     */
    public function show(User $user, MentorMenteeProgram $mentorMenteeProgram): bool
    {
        return $user->isProgramOwner($mentorMenteeProgram->mentor_id)
            || $user->isProgramMentee(
                $mentorMenteeProgram->user_id
            );
    }

    /**
     * @param  User  $user
     * @param  MentorMenteeProgram  $program
     * @return bool
     */
    public function delete(User $user, MentorMenteeProgram $mentorMenteeProgram): bool
    {
        return $user->isProgramOwner($mentorMenteeProgram->mentor_id);
    }
}
