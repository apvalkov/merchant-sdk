<?php

namespace INXY\Payments\Merchant;

use INXY\Payments\Merchant\Enums\ApiUrl;
use INXY\Payments\Merchant\Enums\ApiVersion;
use INXY\Payments\Merchant\Enums\Environment;

class Config
{
    /**
     * @var string
     */
    private $url;
    /**
     * @var string
     */
    private $apiKey;
    /**
     * @var string
     */
    private $secretKey;
    /**
     * @var string
     */
    private $apiVersion;

    /**
     * @param string      $environment
     * @param string      $apiKey
     * @param string      $secretKey
     * @param string|null $apiVersion
     */
    public function __construct($environment, $apiKey, $secretKey, $apiVersion = null)
    {
        $this->url        = $environment === Environment::Production ? ApiUrl::Production : ApiUrl::Sandbox;
        $this->apiKey     = $apiKey;
        $this->secretKey  = $secretKey;
        $this->apiVersion = $apiVersion === null ? ApiVersion::v1 : $apiVersion;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getSecretKey()
    {
        return $this->secretKey;
    }

    /**
     * @return string
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }
}
