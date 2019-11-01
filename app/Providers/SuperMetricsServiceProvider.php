<?php

namespace App\Providers;

use App\Library\Services\SuperMetrics;
use Illuminate\Support\ServiceProvider;

class SuperMetricsServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Library\Services\Contracts\ISuperMetrics', function ($app) {
            return new SuperMetrics($app->make('App\Library\Services\Contracts\DownloaderInterface'));
        });
    }
}
