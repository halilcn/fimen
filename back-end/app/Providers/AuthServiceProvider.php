<?php

namespace App\Providers;

use App\Models\MentorProgram;
use App\Models\User;
use App\Policies\MentorProgramPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        MentorProgram::class => MentorProgramPolicy::class
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Policies ?
        Gate::define(
            'create-mentor-program-appeal',
            function (User $user, MentorProgram $mentorProgram) {
                return !$mentorProgram->isApplied($user->id);
            }
        );
    }
}
