<?php

namespace App\Services;

use App\Repositories\UrlRepository;
use App\Helpers\Utility;
use App\Models\Url;

class UrlService
{
    
    public function __construct(
        protected UrlRepository $urlRepository
    ) {
    }

    public function create(array $data): Url
    {

        //check the url already exist in the system
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