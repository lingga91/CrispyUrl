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

        //check a valid url already exist in the system
        $url_exist = $this->urlRepository->checkUrlExist($data['url_data']);
        if($url_exist){
            return $this->urlRepository->getByUrl($data['url_data']);
        }

        //set expiry date
        $interval_in_days = env('EXPIRY_INTERVAL_IN_DAYS', '10');
        $data['expiry_at'] = date( "Y-m-d H:i:s", strtotime( "$interval_in_days days" ) );

        //set unique code
        $flag= true;
        while($flag){
            $code = Utility::generateRandomString(5);
            $flag = $this->urlRepository->checkCodeExist($code);
        }  
        $data['code'] = $code;

        //save data
        return $this->urlRepository->create($data);
    }

}