<?php

namespace App\Services;

use App\Repositories\UrlRepositoryInterface;

class UrlService
{
    public function __construct(
        protected UrlRepositoryInterface $urlRepository
    ) {
    }

    public function create(array $data)
    {
        dd($data);
        return $this->userRepository->create($data);
    }

}