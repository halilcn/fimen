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

    /**
     * @param  User  $user
     * @param  MentorProgram  $mentorProgram
     * @return bool
     */
    public function destroy(User $user, MentorProgram $mentorProgram): bool
    {
        return $user->isProgramOwner($mentorProgram->mentor_id);
    }

    public function view(User $user, MentorProgram $mentorProgram): bool
    {
        return $user->isProgramOwner($mentorProgram->mentor_id);
    }

}
