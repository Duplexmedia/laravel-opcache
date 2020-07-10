<?php

namespace Appstract\Opcache;

use Appstract\LushHttp\LushFacade as Lush;
use Illuminate\Support\Facades\Crypt as Crypt;

trait CreatesRequest
{
    /**
     * @param $url
     *
     * @return mixed
     */
    public function sendRequest($url)
    {
        return Lush::headers(config('opcache.headers'))->options(array_merge(['verify_ssl' => config('opcache.verify_ssl'),'verify_host' => config('opcache.verify_host',2)], config('opcache.options')))->get(config('opcache.url').'/opcache-api/'.$url,
            ['key' => Crypt::encrypt('opcache')]
        );
    }
}
