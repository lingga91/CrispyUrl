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

        return Url::where('url_data', $url)
                    ->whereRaw("expiry_at >= NOW()")
                    ->exists();
    }

    public function getByUrl(string $url): Url
    {
        /**
         * find and return data by url
        */

        return Url::where('url_data', $url)
                    ->whereRaw("expiry_at >= NOW()")
                    ->first();
    }

    public function getById(int $url_id): Url
    {
        /**
         * find and return data by id
        */

        return Url::where('id', $url_id)
                    ->first();
    }

    public function getByCode(string $code)
    {
        /**
         * find and return data by code
        */

        return  Url::where('code', $code)
                    ->whereRaw("expiry_at >= NOW()")
                    ->first();
    }

    public function getTotalCount(): int
    {
        /**
         * count total urls data exist
        */

        return Url::count();
    }

    public function chunckData(int $limit,int $offset)
    {
        /**
         * get limited the number of urls
        */

        return Url::offset($offset)->limit($limit)->get();
    }

}