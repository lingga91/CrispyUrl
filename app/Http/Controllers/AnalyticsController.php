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

    public function loadData(Request $request)
    {
        $query = $request->query();

        $data =  $this->urlService->getAnalyticsData($query);
        
        return response()->json($data);
    }

}