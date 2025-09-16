<?php

namespace Ashraam\Capjs;

use Ashraam\Capjs\Rules\Capjs;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class CapjsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'capjs');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'capjs');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('capjs.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/capjs'),
            ], 'views');

            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/capjs'),
            ], 'lang');
        }

        Blade::directive('capjsScript', function () {
            return <<<HTML
<script src="https://cdn.jsdelivr.net/npm/@cap.js/widget"></script>
HTML;
        });

        Blade::component('capjs::components.capjs-widget', 'capjs-widget');

        Validator::extend('capjs', function ($attribute, $value, $parameters, $validator) {
            $rule = new Capjs();

            if ($rule->passes($attribute, $value)) {
                return true;
            }

            $validator->addReplacer('capjs', function ($message, $attribute, $ruleName, $parameters) use ($rule) {
                return $rule->message();
            });

            return false;
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
