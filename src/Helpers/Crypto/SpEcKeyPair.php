<?php

namespace Helpers\Crypto;

class SpEcKeyPair
{
    public string $privateKey;
    public string $publicKey;


    function __construct(string $privateKey, string $publicKey)
    {
        $this->setPrivateKey($privateKey);
        $this->setPublicKey($publicKey);
    }

    /**
     * Get ECC private key
     * @return string
     */
    public function getPrivateKey(): string
    {
        return $this->privateKey;
    }

    /**
     * Set ECC private key
     * @param string $privateKey
     * @return void
     */
    public function setPrivateKey(string $privateKey): void
    {
        $this->privateKey = $privateKey;
    }

    /**
     * Get ECC public key
     * @return string
     */
    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    /**
     * Set ECC public key
     * @param string $publicKey
     * @return void
     */
    public function setPublicKey(string $publicKey): void
    {
        $this->publicKey = $publicKey;
    }

}