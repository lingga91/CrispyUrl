<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UrlController extends Controller
{
    public function index(): View
    {
        return view('add_url_form');
    }

    public function save(Request $request): RedirectResponse
    {   
        //validate input
        $input = $request->validate([
            'url_data' => 'required|url|max:2083',
        ]);
        
        dd($input);
    }
}
