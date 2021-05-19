<?php

namespace App\Providers;

use App\Contracts\ApiStorageInterface;
use App\Services\ApiStorageService;
use Illuminate\Support\ServiceProvider;


class ApiStorageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ApiStorageInterface::class,
            ApiStorageService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
