<?php

namespace Payment\Client\Net;

use Payment\Client\SpPaymentSdkException;

final class SpProxy
{
    private string $type = 'http' | 'https';
    private string $host;
    private string $port;
    private string $username;
    private string $password;

    public function __construct()
    {
    }

    /**
     * Get proxy type
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set proxy type
     * @param string $type
     * @throws SpPaymentSdkException
     */
    public function setType(string $type): void
    {
        if ($type != 'http' && $type != 'https') {
            throw new SpPaymentSdkException("Proxy type should be http or https");
        }
        $this->type = $type;
    }

    /**
     * Get type
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * Set host
     * @param string $host
     */
    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    /**
     * Get host
     * @return string
     */
    public function getPort(): string
    {
        return $this->port;
    }

    /**
     * Set port
     * @param string $port
     */
    public function setPort(string $port): void
    {
        $this->port = $port;
    }

    /**
     * Get username
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Set username
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * Get password
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set password
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}