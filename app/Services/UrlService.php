<?php

namespace App\Services;

use App\Repositories\UrlRepository;
use App\Helpers\Utility;

class UrlService
{
    
    public function __construct(
        protected UrlRepository $urlRepository
    ) {
    }

    public function create(array $data)
    {

        //check url already exist
        if($this->urlRepository->checkUrlExist($data['url_data'])){
            return $this->urlRepository->getByUrl($data['url_data']);
        }

        //generate unique code
        $flag= true;
        while($flag){
            $code = Utility::generateRandomString(5);
            $flag = $this->urlRepository->checkCodeExist($code);
        }  

        $data['code'] = $code;
        return $this->urlRepository->create($data);
    }

}