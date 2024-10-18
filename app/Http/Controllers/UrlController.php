<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\UrlService;
use Illuminate\Http\RedirectResponse;

class UrlController extends Controller
{
    public function __construct(
        protected UrlService $urlService
    ) {
    }

    public function index(): View
    {
        return view('add_url_form');
    }

    public function create(Request $request): RedirectResponse
    {   
        //validate input
        $data = $request->validate([
            'url_data' => 'required|url|max:2083',
        ]);
        
        $this->urlService->create($data);
    }
}
