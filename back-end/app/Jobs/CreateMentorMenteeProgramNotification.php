<?php

namespace App\Jobs;

use App\Models\MentorMenteeProgram;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateMentorMenteeProgramNotification
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        public MentorMenteeProgram $mentorMenteeProgram,
        public string $type,
        public array $data
    ) {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->mentorMenteeProgram->notifications()->create(
            [
                'notification_type' => $this->type,
                'data' => $this->data
            ]
        );
    }
}
