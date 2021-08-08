<?php

namespace App\Observers;

use App\Models\MentorMenteeProgramMessage;
use Illuminate\Support\Facades\Storage;

class MentorMenteeProgramMessageObserver
{
    /**
     * Handle the MentorMenteeProgramMessage "created" event.
     *
     * @param  \App\Models\MentorMenteeProgramMessage  $mentorMenteeProgramMessage
     * @return void
     */
    public function created(MentorMenteeProgramMessage $mentorMenteeProgramMessage)
    {
        //
    }

    /**
     * Handle the MentorMenteeProgramMessage "updated" event.
     *
     * @param  \App\Models\MentorMenteeProgramMessage  $mentorMenteeProgramMessage
     * @return void
     */
    public function updated(MentorMenteeProgramMessage $mentorMenteeProgramMessage)
    {
        //
    }

    /**
     * Handle the MentorMenteeProgramMessage "deleted" event.
     *
     * @param  \App\Models\MentorMenteeProgramMessage  $mentorMenteeProgramMessage
     * @return void
     */
    public function deleted(MentorMenteeProgramMessage $mentorMenteeProgramMessage)
    {
        if ($mentorMenteeProgramMessage->message_type === 'media') {
            collect(json_decode($mentorMenteeProgramMessage->message))->map(function ($media) {
                return Storage::delete($media);
            });
        }
    }

    /**
     * Handle the MentorMenteeProgramMessage "restored" event.
     *
     * @param  \App\Models\MentorMenteeProgramMessage  $mentorMenteeProgramMessage
     * @return void
     */
    public function restored(MentorMenteeProgramMessage $mentorMenteeProgramMessage)
    {
        //
    }

    /**
     * Handle the MentorMenteeProgramMessage "force deleted" event.
     *
     * @param  \App\Models\MentorMenteeProgramMessage  $mentorMenteeProgramMessage
     * @return void
     */
    public function forceDeleted(MentorMenteeProgramMessage $mentorMenteeProgramMessage)
    {
        //
    }
}
