<?php


namespace App\Library\Facades;

use Illuminate\Support\Facades\Facade;

class SuperToken extends Facade
{
    protected static function getFacadeAccessor() {
        return 'App\Library\Services\Contracts\ISMToken';
    }
}
