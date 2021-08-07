<?php

namespace App\Policies;

use App\Models\MentorMenteeProgram;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MentorMenteeProgramMessagePolicy
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
     * @param  MentorMenteeProgram  $mentorMenteeProgram
     * @return bool
     */
    public function create(User $user, MentorMenteeProgram $mentorMenteeProgram): bool
    {
        return $user->isProgramOwner($mentorMenteeProgram->mentor_id)
            || $user->isProgramMentee(
                $mentorMenteeProgram->user_id
            );
    }

    /**
     * @param  User  $user
     * @param  MentorMenteeProgram  $mentorMenteeProgram
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
     * @param  MentorMenteeProgram  $mentorMenteeProgram
     * @return bool
     */
    public function deleteAll(User $user, MentorMenteeProgram $mentorMenteeProgram): bool
    {
        return $user->isProgramOwner($mentorMenteeProgram->mentor_id)
            || $user->isProgramMentee(
                $mentorMenteeProgram->user_id
            );
    }


}
