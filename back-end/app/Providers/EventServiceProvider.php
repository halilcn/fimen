<?php

namespace App\Providers;

use App\Events\MentorProgramSaved;
use App\Events\SendEmail;
use App\Listeners\SendMentorProgramNotification;
use App\Listeners\UserEmailVerification;
use App\Models\MentorMenteeProgram;
use App\Observers\MentorMenteeProgramObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        MentorProgramSaved::class => [
            SendMentorProgramNotification::class
        ]
        /*
         *  UserEmailVerification::class => [
             SendEmail::class,
         ],*/
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        MentorMenteeProgram::observe(MentorMenteeProgramObserver::class);
    }
}
