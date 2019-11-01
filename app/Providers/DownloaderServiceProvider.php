<?php

namespace App\Providers;

use App\Library\Services\SuperMetrics;
use App\Library\Services\Downloader;
use Illuminate\Support\ServiceProvider;

class DownloaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            'App\Library\Services\Contracts\DownloaderInterface',
            'App\Library\Services\Downloader'
        );

//        $this->app->bind('App\Library\Services\Contracts\DownloaderInterface', function ($app) {
//            return new Downloader();
//        });
    }
}
