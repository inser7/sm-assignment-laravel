<?php


namespace App\Library\Facades;

use Illuminate\Support\Facades\Facade;


class SuperMetrics extends Facade
{
    protected static function getFacadeAccessor() {
        return 'App\Library\Services\Contracts\ISuperMetrics';
    }
}
