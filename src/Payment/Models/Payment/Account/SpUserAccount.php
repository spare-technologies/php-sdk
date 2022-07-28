<?php


namespace Payment\Models\Payment\Account;


class SpUserAccount
{
    public string $customerReferenceId;
    public string $customerPaymentLink;

    function __construct(string $CustomerReferenceId, string $CustomerPaymentLink) {
        $this->customerReferenceId = $customerReferenceId;
        $this->customerPaymentLink = $CustomerPaymentLink;

    }

    /**
     * @return string
     */
    public function getCustomerPaymentLink(): string
    {
        return $this->customerPaymentLink;
    }

    /**
     * @param string $customerPaymentLink
     */
    public function setCustomerPaymentLink(string $customerPaymentLink): string
    {
        return $this->customerPaymentLink;
    }

    /**
     * @return string
     */
    public function getCustomerReferenceId(): string
    {
        return $this->customerReferenceId;
    }

    /**
     * @param string $customerReferenceId
     */
    public function setCustomerReferenceId(string $customerReferenceId): void
    {
        $this->customerReferenceId = $customerReferenceId;
    }

}