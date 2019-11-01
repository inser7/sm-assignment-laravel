<?php


namespace App\Library\Services;


use App\Library\Services\Contracts\DownloaderInterface;
use App\Library\Services\Contracts\ISMToken;
use App\Library\Services\Cacher;

class SuperToken implements ISMToken
{

    private $downloader;

    public function __construct(DownloaderInterface $downloader) {
        $this->downloader = $downloader;
        $cacher = new Cacher(env('DOWNLOADER_CACHE_TIMEOUT'), 60);
        $this->downloader->setCacher($cacher);
    }

    public function getToken()
    {

        $clientId = env('CLIENT_ID',"");
        $email = env('EMAIL',"");
        $name = env('FULL_NAME',"");

        $this->downloader->setUrl(env('API_BASE_URL')."/register");
        $token = $this->downloader->post([
            'client_id' =>$clientId,
            'email' => $email,
            'name' => $name
        ]);

        return $token->sl_token;
    }
}
