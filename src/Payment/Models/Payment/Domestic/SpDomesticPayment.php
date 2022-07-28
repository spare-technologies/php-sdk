<?php


namespace Payment\Models\Payment\Domestic;

class SpDomesticPayment
{
    public  string $orderId;
    public  float $amount;
    public  string $description;

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

      /**
     * @param string $orderId
     */
    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
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

}