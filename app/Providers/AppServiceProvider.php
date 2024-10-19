<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UrlRepository;
use App\Repositories\UrlRepositoryInterface;
use App\Repositories\VisitorRepository;
use App\Repositories\VisitorRepositoryInterface;
use App\Services\UrlService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UrlRepositoryInterface::class, UrlRepository::class);
        $this->app->bind(VisitorRepositoryInterface::class, VisitorRepository::class);
        $this->app->bind(UrlService::class, function ($app) {
            return new UrlService($app->make(UrlRepositoryInterface::class),$app->make(VisitorRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
