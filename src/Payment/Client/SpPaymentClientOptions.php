<?php


namespace Payment\Client;


use Payment\Client\Net\SpProxy;

class SpPaymentClientOptions
{
    public string $baseUrl;
    public string $appId;
    public string $appKey;

    public ?SpProxy $proxy;

    function __construct(string $BaseUrl, string $appId, string $appKey)
    {
        $this->baseUrl = $BaseUrl;
        $this->appId = $appId;
        $this->appKey = $appKey;
        $this->setProxy(null);
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @param string $appId
     */
    public function setAppId(string $appId): void
    {
        $this->appId = $appId;
    }

    /**
     * @return string
     */
    public function getAppKey(): string
    {
        return $this->appKey;
    }

    /**
     * @param string $appKey
     */
    public function setAppKey(string $appKey): void
    {
        $this->appKey = $appKey;
    }

    /**
     * Get proxy
     * @return SpProxy|null
     */
    public function getProxy(): ?SpProxy
    {
        return $this->proxy;
    }

    /**
     * Set proxy
     * @param SpProxy|null $proxy
     */
    public function setProxy(?SpProxy $proxy): void
    {
        $this->proxy = $proxy;
    }

}