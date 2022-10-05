<?php

namespace Payment\Models\Payment\Domestic;


final class SpPaymentRequest extends SpDomesticPayment
{

    public SpCustomerInformation $customerInformation;

    /**
     * @return SpCustomerInformation
     */
    public function getCustomerInformation(): SpCustomerInformation
    {
        return $this->customerInformation;
    }

    /**
     * @param SpCustomerInformation $CustomerInformation
     */
    public function setCustomerInformation(SpCustomerInformation $CustomerInformation): void
    {
        $this->customerInformation = $CustomerInformation;
    }
}