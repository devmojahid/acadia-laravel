<?php

namespace App\Providers;

use App\Contracts\ConfigContract;
use App\Supports\ConfigService;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ConfigContract::class, function ($app) {
            return new ConfigService($app);
        });

        $this->app->alias(ConfigContract::class, 'configs');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}