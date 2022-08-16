<?php

namespace Payment\Models\Payment\Domestic;


class SpDomesticPaymentRequest extends SpDomesticPayment {

    public mixed $customerInformation;

    /**
     * @return mixed
     */
    public function getCustomerInformation(): mixed
    {
        return $this->customerInformation;
    }

    /**
     * @param mixed $CustomerInformation
     */
    public function setCustomerInformation(mixed $CustomerInformation): void
    {
        $this->customerInformation = $CustomerInformation;
    }
}