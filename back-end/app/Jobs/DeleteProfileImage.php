<?php

namespace App\Jobs;

use App\Services\ApiStorageService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Auth;

use function Composer\Autoload\includeFile;

class DeleteProfileImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public $user)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->user->image_public_id) {
            if ((new ApiStorageService)->delete($this->user->image_public_id)) {
                $this->user->update(
                    [
                        'image_public_id' => null
                    ]
                );
            }
        }
    }
}
