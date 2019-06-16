<?php

namespace Mawdoo3\Search;

use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'search');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->publishes([__DIR__ . '/config/sp_mawdoo3_laravel.php' => config_path('sp_mawdoo3_laravel.php')]);
        $this->publishes([__DIR__ . '/app/Console/Commands/ExportResults.php' => app_path('/Console/Commands/ExportResults.php')]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/sp_mawdoo3_laravel.php', 'sp_mawdoo3_laravel'
        );
    }
}
