<?php

namespace App\Listeners;

use App\Events\MentorProgramSaved;
use App\Models\MentorProgram;
use App\Models\User;
use App\Notifications\NewMentorProgram;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Query\Builder;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendMentorProgramNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  MentorProgramSaved  $event
     * @return void
     */
    public function handle(MentorProgramSaved $event)
    {
        $users = User::query()
            ->where('id', '!=', $event->mentorProgram->mentorUser->user->id)
            ->whereHas(
                'permissions',
                function ($query) {
                    $query->where('mentor_program_notify', true);
                }
            )->get();

        Notification::send($users, new NewMentorProgram($event->mentorProgram));
    }
}
