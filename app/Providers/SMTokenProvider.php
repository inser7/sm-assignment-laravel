<?php


namespace App\Providers;


use App\Library\Services\SuperToken;
use Illuminate\Support\ServiceProvider;
use App\Library\Services\Contracts\DownloaderInterface;

class SMTokenProvider extends ServiceProvider
{

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
        $this->app->bind('App\Library\Services\Contracts\ISMToken', function ($app) {
//            return new SuperToken(DownloaderInterface $f);
             return new SuperToken($app->make('App\Library\Services\Contracts\DownloaderInterface'));
        });
    }
}
