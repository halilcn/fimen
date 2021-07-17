<?php

namespace App\Providers;

use App\Events\MentorProgramSaved;
use App\Listeners\SendMentorProgramNotification;
use App\Models\MentorMenteeProgram;
use App\Observers\MentorMenteeProgramObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
