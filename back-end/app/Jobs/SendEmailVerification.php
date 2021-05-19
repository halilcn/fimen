<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailVerification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $information;

    /**
     * SendEmailVerification constructor.
     * @param  array  $information
     */
    public function __construct(array $information)
    {
        $this->information = $information;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(
            "emailTemplates.userEmailVerification",
            [
                'username' => $this->information['username'],
                'code' => $this->information['code'],
            ],
            function ($message) {
                $message->to(
                    $this->information['email'],
                    'Sayın '.$this->information['username']
                )->subject("E-mail Onayı");
            }
        );
    }
}
