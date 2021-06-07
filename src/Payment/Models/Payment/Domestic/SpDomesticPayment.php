<?php


namespace Payment\Models\Payment\Domestic;


use http\Url;

class SpDomesticPayment
{
    public int $amount;
    public string $description;
    public Url $successUrl;
    public Url $failUrl;

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Url
     */
    public function getSuccessUrl(): Url
    {
        return $this->successUrl;
    }

    /**
     * @param Url $successUrl
     */
    public function setSuccessUrl(Url $successUrl): void
    {
        $this->successUrl = $successUrl;
    }

    /**
     * @return Url
     */
    public function getFailUrl(): Url
    {
        return $this->failUrl;
    }

    /**
     * @param Url $failUrl
     */
    public function setFailUrl(Url $failUrl): void
    {
        $this->failUrl = $failUrl;
    }

}