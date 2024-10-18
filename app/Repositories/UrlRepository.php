<?php

namespace App\Repositories;

use App\Models\Url;

class UrlRepository implements UrlRepositoryInterface
{

    
    public function create(array $data): Url
    {
        /**
         * create new url data
        */

        return Url::create($data);
    }

    public function checkCodeExist(string $code): bool
    {
        /**
         * check a code already exist
        */

        return Url::where('code', $code)->exists();
    }

    public function checkUrlExist(string $url): bool
    {
        /**
         * check a url already exist
         * and valid/not expired
        */

        return Url::where('url_data', $url)->exists();
    }

    public function getByUrl(string $url): Url
    {
        /**
         * find and return data by url
        */

        return Url::where('url_data', $url)->first();
    }

}