<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\UrlService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

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
            'url_data' => 'required|url:https|max:2083',
        ]);

        try {
            $record = $this->urlService->create($data);
            $short_url = url($record->code);
            return redirect()->back()->with('message', "Your short url: $short_url");
        } catch (\Exception $e) {
            Log::error('Error creating short url: ' . $e->getMessage());
            abort(500, $e->getMessage());
        }
    }

    public function loadUrl(string $code,Request $request): RedirectResponse
    {
        try {
            $ip_address = $request->ip();
            $redirect_url = $this->urlService->getRedirectUrl($code,$ip_address);
            return redirect($redirect_url);
        } catch (\Exception $e) {
            if($e->getCode() == '404'){
                abort(404);
            }
            Log::error('Error loading url: ' . $e->getMessage());
            abort(500, $e->getMessage());
        }
    }
}
