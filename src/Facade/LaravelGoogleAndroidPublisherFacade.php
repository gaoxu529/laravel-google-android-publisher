<?php

namespace risingsun\LaravelGoogleAndroidPublisher\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @see \risingsun\LaravelGoogleAndroidPublisher\LaravelGoogleAndroidPublisher
 */
class LaravelGoogleAndroidPublisherFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel_google_android_publish';
    }
}
