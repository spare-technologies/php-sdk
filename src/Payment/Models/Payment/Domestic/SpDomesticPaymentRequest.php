<?php

namespace Payment\Models\Payment\Domestic;


class SpDomesticPaymentRequest extends SpDomesticPayment {

    public SpPaymentDebtorInformation $customerInformation;

    /**
     * @return SpPaymentDebtorInformation
     */
    public function getCustomerInformation(): SpPaymentDebtorInformation
    {
        return $this->customerInformation;
    }

    /**
     * @param SpPaymentDebtorInformation $CustomerInformation
     */
    public function setCustomerInformation(SpPaymentDebtorInformation $CustomerInformation): void
    {
        $this->customerInformation = $CustomerInformation;
    }
}