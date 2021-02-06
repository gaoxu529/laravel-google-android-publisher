<?php
return [
    'google' => [
        'auth_config' => storage_path('laravel-google-android-publisher.json'),

        'scopes' => [
            \Google_Service_AndroidPublisher::ANDROIDPUBLISHER
        ],
    ],
];