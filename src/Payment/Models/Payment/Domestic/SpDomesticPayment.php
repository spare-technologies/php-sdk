<?php

namespace Payment\Models\Payment\Domestic;

class SpDomesticPayment extends SpPayment
{
    public string $orderId;

    /**
     * Set order id
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * Get order id
     * @param string $orderId
     */
    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }
}