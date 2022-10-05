<?php

namespace Payment\Models\Payment\Domestic;

use Payment\Models\SpBaseModel;

class SpCreateDomesticPaymentResponse extends SpBaseModel
{
    public SpPaymentResponse $payment;
    public string $signature;

    /**
     * @param SpPaymentResponse $payment
     * @param string $signature
     */
    public function __construct(SpPaymentResponse $payment, string $signature)
    {
        $this->payment = $payment;
        $this->signature = $signature;
    }

    /**
     * Get payment response
     * @return SpPaymentResponse
     */
    public function getPayment(): SpPaymentResponse
    {
        return $this->payment;
    }

    /**
     * Get signature
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }


}