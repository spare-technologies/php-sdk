<?php

namespace Payment\Models\Payment\Domestic;


final class SpDomesticPaymentRequest extends SpDomesticPayment
{

    protected SpCustomerInformation $customerInformation;

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