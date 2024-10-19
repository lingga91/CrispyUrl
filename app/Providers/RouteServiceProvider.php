<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;

class RouteServiceProvider extends ServiceProvider
{

    
    public function boot(): void
    {
        $this->configureRateLimiting();
        
    }
    
    /**
     * set 100 request per minute for 
     * each ip address
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('global', function (Request $request) {
            return  Limit::perMinute(100)->by($request->ip());
        });
    }
}