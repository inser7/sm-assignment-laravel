<?php

namespace App\Library\Services\Contracts;

/**
 * This interface is used to guarantee correct method and it's argument existing.
 *
 */
interface DownloaderInterface
{
    function post(array $data);
    function get();
}
