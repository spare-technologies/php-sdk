<?php


namespace Payment\Models\Payment\Domestic;

use Payment\Models\Payment\Domestic\SpPaymentDebtorInformation;



class SpDomesticPayment
{
    public  string $orderId;
    public  SpPaymentDebtorInformation $customerInformation;
    public  float $amount;
    public  string $description;

    function __construct(string $orderId, SpPaymentDebtorInformation $customerInformation, float $amount, string $description)
    {
        $this->orderId = $orderId;
        $this->customerInformation = $customerInformation;
        $this->amount = $amount;
        $this->description = $description;
    }


    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

      /**
     * @return $orderId
     */
    public function setOrderId(string $orderId): string
    {
        $this->orderId = $orderId;
    }

      /**
     * @return SpPaymentDebtorInformation
     */
    public function getCustomerInformation(): SpPaymentDebtorInformation
    {
        return $this->customerInformation;
    }

      /**
     * @return $customerInformation
     */
    public function setCustomerInformation(SpPaymentDebtorInformation $customerInformation): void
    {
        $this->customerInformation = $customerInformation;
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