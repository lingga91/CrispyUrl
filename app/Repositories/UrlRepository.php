<?php

namespace App\Repositories;

use App\Models\Url;

class UrlRepository implements UrlRepositoryInterface
{

    public function create(array $data)
    {
        return Url::create($data);
    }

    public function checkCodeExist(string $code)
    {
        return Url::where('code', $code)->exists();
    }

}