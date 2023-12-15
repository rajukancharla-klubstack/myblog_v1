<?php

namespace App\Providers;

use App\Services\ApiService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $apiUrl = config('services.external_api.url');

        $this->app->bind(ApiService::class, function ($app) use ($apiUrl) {
            return new ApiService($apiUrl);
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
