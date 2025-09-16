<?php

namespace Ashraam\Capjs;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CapjsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'capjs');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'capjs');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('capjs.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/capjs'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/capjs'),
            ], 'assets');*/

            // $this->publishes([
            //     __DIR__.'/../lang' => resource_path('lang/vendor/capjs'),
            // ], 'lang');

            // Registering package commands.
            // $this->commands([]);
        }

        Blade::directive('capjsScript', function () {
            return <<<HTML
<script src="https://cdn.jsdelivr.net/npm/@cap.js/widget"></script>
HTML;
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'capjs');

        // Register the main class to use with the facade
        $this->app->singleton('capjs', function () {
            return new Capjs;
        });
    }
}
