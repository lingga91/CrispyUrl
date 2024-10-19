<?php

namespace App\Repositories;

interface VisitorRepositoryInterface
{

    public function setVisitor(array $data);
    public function getTotalCountByUrl(int $url_id);
    public function chunckDataByUrl(int $url_id,int $limit,int $offset);

}