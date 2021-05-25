<?php

namespace App\Jobs;

use App\Services\ApiStorageService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use function PHPUnit\Framework\fileExists;

class UploadProfileImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * @var int
     */
    public int $tries = 3;

    /**
     * @var int
     */
    public int $timeout = 20;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public $user, public $path)
    {
    }


    public function handle(ApiStorageService $storageService): string
    {
        $res = $storageService->put(
            Storage::disk('temporary')->url($this->path),
            [
                'folder' => 'users-profile',
                'resource_type' => 'image',
                'transformation' => [
                    'width' => 256,
                    'height' => 256
                ]
            ]
        );
        //  ->only('public_id', 'secure_url')
        // ->toArray();

   //     Storage::disk('temporary')->delete($this->path);
        /* $this->user->update(
             [
                 'image' => 'deneme',//$res['secure_url'],
                 'image_public_id' => 'deneme' //$res['public_id']
             ]
         );*/
    }

}
