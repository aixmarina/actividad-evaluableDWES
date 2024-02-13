<?php

namespace App\Providers;

use App\Services\LanguageFilterService;
use Illuminate\Support\ServiceProvider;

class LanguageFilterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(LanguageFilterService::class, function ($app) {
            return new LanguageFilterService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
