<?php

namespace App\Services;

use App\Repositories\UrlRepository;
use App\Helpers\Utility;
use App\Models\Url;
use App\Models\Visitor;

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

    public function getRedirectUrl(string $code,string $ip_address): string
    {
        $data = $this->urlRepository->getByCode($code);
        if(!$data){
            throw new \Exception('url not found',404);       
        }

        //set visitor
        $visitor_data = [
            'ip_address' => $ip_address,
            'url_id'=>$data->id
        ];
        $this->urlRepository->setVisitor($visitor_data);

        //update visit count
        $data->visit_count +=1;
        $data->save();

        return $data->url_data;
    }

    public function getAnalyticsData(array $input)
    {
        $limit = $input['length']; 
        $offset = $input['start'];  
        
        $query = new Url; //start query builder 
        $recordsTotal = $query->count(); //get total records 
        $recordsFiltered = $query->count(); //get total records filtered 
        $data = $query->offset($offset)->limit($limit)->get(); //paginate data

        $result = [ 
            'draw' => $input['draw'], 
            'recordsTotal' => $recordsTotal, 
            'recordsFiltered' => $recordsFiltered, 
            'data' => $data, 
        ];
        return $result;
    }

    public function getUrlById(int $url_id) : array
    {
        $data = $this->urlRepository->getById($url_id);
        return $data->toArray();
    }

    public function getVisitors(int $url_id,array $input)
    {
        $limit = $input['length']; 
        $offset = $input['start'];  
        
        $query = Visitor::where('url_id',$url_id); //start query builder 
        $recordsTotal = $query->count(); //get total records 
        $recordsFiltered = $query->count(); //get total records filtered 
        $data = $query->offset($offset)->limit($limit)->get(); //paginate data

        $result = [ 
            'draw' => $input['draw'], 
            'recordsTotal' => $recordsTotal, 
            'recordsFiltered' => $recordsFiltered, 
            'data' => $data, 
        ];
        return $result;
    }

}