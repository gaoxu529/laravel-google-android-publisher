<?php

namespace risingsun\LaravelGoogleAndroidPublisher\ServiceProvider;

use risingsun\LaravelGoogleAndroidPublisher\LaravelGoogleAndroidPublisher;
use Illuminate\Support\ServiceProvider;

class LaravelGoogleAndroidPublisherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../config/config.php' => config_path('laravel-google-android-publish.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'laravel-google-android-publish');

        $this->app->bind('laravel_google_android_publish', function () {
            return new LaravelGoogleAndroidPublisher();
        });
    }
}
