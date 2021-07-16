<?php

namespace App\Observers;

use App\Models\MentorMenteeProgram;
use App\Models\User;
use App\Notifications\DestroyMentorMenteeProgram;
use App\Notifications\MenteeConfirmation;

class MentorMenteeProgramObserver
{
    /**
     * Handle the MentorMenteeProgram "created" event.
     *
     * @param  \App\Models\MentorMenteeProgram  $mentorMenteeProgram
     * @return void
     */
    public function created(MentorMenteeProgram $mentorMenteeProgram)
    {
        $user = User::find($mentorMenteeProgram->user_id);
        $user->notifyNow(new MenteeConfirmation($mentorMenteeProgram));
    }

    /**
     * Handle the MentorMenteeProgram "updated" event.
     *
     * @param  \App\Models\MentorMenteeProgram  $mentorMenteeProgram
     * @return void
     */
    public function updated(MentorMenteeProgram $mentorMenteeProgram)
    {
        //
    }

    /**
     * Handle the MentorMenteeProgram "deleted" event.
     *
     * @param  \App\Models\MentorMenteeProgram  $mentorMenteeProgram
     * @return void
     */
    public function deleted(MentorMenteeProgram $mentorMenteeProgram)
    {
        $user = User::find($mentorMenteeProgram->user_id);
        $user->notifyNow(new DestroyMentorMenteeProgram($mentorMenteeProgram));
    }

    /**
     * Handle the MentorMenteeProgram "restored" event.
     *
     * @param  \App\Models\MentorMenteeProgram  $mentorMenteeProgram
     * @return void
     */
    public function restored(MentorMenteeProgram $mentorMenteeProgram)
    {
        //
    }

    /**
     * Handle the MentorMenteeProgram "force deleted" event.
     *
     * @param  \App\Models\MentorMenteeProgram  $mentorMenteeProgram
     * @return void
     */
    public function forceDeleted(MentorMenteeProgram $mentorMenteeProgram)
    {
        //
    }
}
