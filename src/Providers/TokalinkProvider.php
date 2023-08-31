<?php

namespace Tokalink\Starter\Providers;

use Illuminate\Support\ServiceProvider;

class TokalinkProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routers/web.php');
        $this->loadViewsFrom(__DIR__.'/../views', 'tokalink');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        // seeders
        // coomand tokalink:install
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Tokalink\Starter\Commands\Tokalink::class,
            ]);
        }
        // copy assets to public folder
        $this->publishes([
            __DIR__.'/../tokalink-assets' => public_path('tokalink-assets'),
        ], 'tokalink-assets');

        $this->publishes([
            __DIR__.'/../config/tokalink.php' => config_path('tokalink.php'),
        ], 'tokalink-config');

        // migrations
        // $this->publishes([
        //     __DIR__.'/../migrations' => database_path('migrations'),
        // ], 'tokalink-migrations');

        // load middleware
        $this->app['router']->aliasMiddleware('IsAdminTokalink', \Tokalink\Starter\Middleware\IsAdminTokalink::class);
    }

    /**
     * Register the application's policies.
     */
    protected function registerPolicies(): void
    {
        //
    }

    /**
     * Register the application's route middleware.
     */
    protected function registerRouteMiddleware(): void
    {
        //
    }

    /**
     * Register the application's route middleware groups.
     */
    protected function registerMiddlewareGroups(): void
    {
        //
    }

    /**
     * Register the application's custom validators.
     */
    protected function registerCustomValidators(): void
    {
        //
    }

    /**
     * Register the application's custom database resolvers.
     */
    protected function registerDatabaseResolvers(): void
    {
        //
    }


}
