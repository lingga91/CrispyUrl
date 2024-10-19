<?php

namespace App\Repositories;

use App\Models\Visitor;

class VisitorRepository implements VisitorRepositoryInterface
{

    public function setVisitor(array $data): Visitor
    {
        /**
         * set visitor for an url
        */

        return Visitor::create($data);
    }

    public function getTotalCountByUrl(int $url_id): int
    {
        /**
         * count total visitor data exist
         * for an url
        */

        return Visitor::where('url_id',$url_id)->count();
    }

    public function chunckDataByUrl(int $url_id,int $limit,int $offset)
    {
        /**
         * get limited the number of visitor
         * by url
        */

        return Visitor::where('url_id',$url_id)->offset($offset)->limit($limit)->get();
    }

}