<?php

namespace App\Repositories;

interface UrlRepositoryInterface
{

    public function create(array $data);
    public function checkCodeExist(string $code);
    public function checkUrlExist(string $url);
    public function getByUrl(string $url);
    public function getById(int $url_id);
    public function getByCode(string $code);
    public function setVisitor(array $data);

}