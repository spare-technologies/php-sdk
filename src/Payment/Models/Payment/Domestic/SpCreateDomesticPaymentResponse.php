<?php

namespace Payment\Models\Payment\Domestic;

class SpCreateDomesticPaymentResponse
{
    public SpDomesticPaymentResponse $payment;
    public string $signature;

    /**
     * @param SpDomesticPaymentResponse $payment
     * @param string $signature
     */
    public function __construct(SpDomesticPaymentResponse $payment, string $signature)
    {
        $this->payment = $payment;
        $this->signature = $signature;
    }

    /**
     * @return SpDomesticPaymentResponse
     */
    public function getPayment(): SpDomesticPaymentResponse
    {
        return $this->payment;
    }

    /**
     * @param SpDomesticPaymentResponse $payment
     */
    public function setPayment(SpDomesticPaymentResponse $payment): void
    {
        $this->payment = $payment;
    }

    /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     */
    public function setSignature(string $signature): void
    {
        $this->signature = $signature;
    }


}