<?php

namespace test\php\models;

class SpTestEnvironment
{

    public bool $debugMode;
    public string $baseUrl;
    public mixed $ecKeypair;
    public string $serverPublicKey;
    public string $apiKey;
    public string $appId;
    public mixed $proxy;

    /**
     * @return bool
     */
    public function getDebugMode(): bool
    {
        return $this->debugMode;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return mixed
     */
    public function getEcKeypair(): mixed
    {
        return $this->ecKeypair;
    }

    /**
     * @return string
     */
    public function getServerPublicKey(): string
    {
        return $this->serverPublicKey;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @return mixed
     */
    public function getProxy(): mixed
    {
        return $this->proxy;
    }

    /**
     * @param bool $debugMode
     */
    public function setDebugMode(bool $debugMode): void
    {
        $this->debugMode = $debugMode;
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @param mixed $ecKeypair
     */
    public function setEcKeypair(mixed $ecKeypair): void
    {
        $this->ecKeypair = $ecKeypair;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $appId
     */
    public function setAppId(string $appId): void
    {
        $this->appId = $appId;
    }

    /**
     * @param string $serverPublicKey
     */
    public function setServerPublicKey(string $serverPublicKey): void
    {
        $this->serverPublicKey = $serverPublicKey;
    }

    /**
     * @param mixed $proxy
     */
    public function setProxy(mixed $proxy): void
    {
        $this->proxy = $proxy;
    }

}