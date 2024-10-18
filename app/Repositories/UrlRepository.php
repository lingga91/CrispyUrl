<?php

namespace App\Repositories;

use App\Models\Url;

class UrlRepository implements UrlRepositoryInterface
{

    public function create(array $data): Url
    {
        return Url::create($data);
    }

    public function checkCodeExist(string $code): bool
    {
        return Url::where('code', $code)->exists();
    }

    public function checkUrlExist(string $url): bool
    {
        return Url::where('url_data', $url)->exists();
    }

    public function getByUrl(string $url): Url
    {
        return Url::where('url_data', $url)->first();
    }

}