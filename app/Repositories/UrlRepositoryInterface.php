<?php

namespace App\Repositories;

interface UrlRepositoryInterface
{

    public function create(array $data);
    public function checkCodeExist(string $code);

}