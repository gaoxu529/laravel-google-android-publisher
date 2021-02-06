<?php

namespace risingsun\LaravelGoogleAndroidPublisher;

use Google_Client;

class LaravelGoogleAndroidPublisher
{
    /** @var Google_Client */
    private $googleClient;

    /** @var \Google_Service_AndroidPublisher */
    private $androidPublisherService;

    public function __construct()
    {
        $this->googleClient = new Google_Client();

        $this->googleClient->setAuthConfig(config('laravel-google-android-publish.google.auth_config'));

        foreach (config('laravel-google-android-publish.google.scopes', []) as $scope) {
            $this->googleClient->addScope($scope);
        }

        $this->androidPublisherService = new \Google_Service_AndroidPublisher($this->googleClient);
    }

    public static function create(): self
    {
        return new static();
    }

    /**
     * @param string $packageName
     * @param string $sku
     * @param string $token
     * @return \Google_Service_AndroidPublisher_ProductPurchase
     */
    public function getOrderByToken(string $packageName, string $sku, string $token)
    {
        return $this->androidPublisherService
            ->purchases_products->get($packageName, $sku, $token);
    }

    /**
     * @param string $packageName
     * @param string $sku
     * @param string $token
     * @param $developerPayload
     * @return \GuzzleHttp\Psr7\Request
     */
    public function OrderConfirm(string $packageName, string $sku, string $token, $developerPayload)
    {
        $productPurchasesAcknowledgeRequest = new \Google_Service_AndroidPublisher_ProductPurchasesAcknowledgeRequest();
        $productPurchasesAcknowledgeRequest->setDeveloperPayload($developerPayload);

        return $this->androidPublisherService
            ->purchases_products->acknowledge($packageName, $sku, $token, $productPurchasesAcknowledgeRequest);
    }
}
