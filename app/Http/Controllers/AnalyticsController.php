<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\UrlService;
use Illuminate\Http\RedirectResponse;

class AnalyticsController extends Controller
{
    public function __construct(
        protected UrlService $urlService
    ) {
    }

    public function index(): View
    {
        return view('analytics_index');
    }

    public function details(int $url_id): View
    {
        $data =  $this->urlService->getUrlById($url_id);
        return view('analytics_details',$data);
    }

    public function loadData(Request $request)
    {
        $query = $request->query();

        $data =  $this->urlService->getAnalyticsData($query);
        
        return response()->json($data);
    }

    public function loadVisitor(string $url_id,Request $request)
    {
        $query = $request->query();

        $data =  $this->urlService->getVisitors($url_id,$query);
        
        return response()->json($data);
    }

}