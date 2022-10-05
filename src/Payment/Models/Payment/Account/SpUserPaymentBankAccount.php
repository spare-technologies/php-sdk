<?php


namespace Payment\Models\Payment\Account;


final class SpUserPaymentBankAccount
{
    public string $scheme;
    public string $identification;

    /**
     * @param string $scheme
     */
    public function setScheme(string $scheme): void
    {
        $this->scheme = $scheme;
    }

    /**
     * @param string $identification
     */
    public function setIdentification(string $identification): void
    {
        $this->identification = $identification;
    }


    /**
     * Get scheme name
     * @return string
     */
    public function getSchema(): string
    {
        return $this->scheme;
    }

    /**
     * Get identification
     * @return string
     */
    public function getIdentification(): string
    {
        return $this->identification;
    }
}