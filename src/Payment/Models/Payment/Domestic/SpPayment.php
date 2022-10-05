<?php


namespace Payment\Models\Payment\Domestic;


use Payment\Models\SpBaseModel;

abstract class SpPayment extends SpBaseModel
{
    public float $amount;

    public string $description;

    /**
     * Get amount
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Set amount
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Get description
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set description
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}